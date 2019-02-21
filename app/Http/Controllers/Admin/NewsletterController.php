<?php

namespace App\Http\Controllers\Admin;

use App\Newsletter;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class NewsletterController extends Controller
{
    public $title_fa = 'خبرنامه';
    public $titles_fa = 'خبرنامه ها';

    public $route = 'newsletter';
    public $preRoute = 'admin';

    public $folder = 'newsletter';
    public $preFolder = 'admin';

    protected $paginate = 30;
    protected $thumbnails = ['385/200'];

    public function index()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => 'خبرنامه ها'],
        ];
        $data['objects'] = Newsletter::latest()->paginate($this->paginate);
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        return view("$this->preFolder.$this->folder.index", compact('data', 'items'));
    }


    public function show(Newsletter $newsletter)
    {
        if ($newsletter->seen == 0) {
            $newsletter->seen = 1;
            $newsletter->save();
            return redirect()->back()->with('info', 'این نفر از لیست خبرنامه های جدید حذف شد.');
        }
        return redirect()->back()->with('msg', 'قبلا این مورد را دیده اید.');

    }

    public function export()
    {
        $newsletters = Newsletter::all(['id', 'name', 'family', 'mobile', 'email']);
        if ($newsletters->isEmpty()) {
            return redirect()->back()->with('info', 'موردی یافت نشد.');
        }
        $time = time();

        // site name
        $name = removeSpecialChar(config('app.name'));
        Excel::create("{$name}-newsletter-" . $time, function ($excel) use ($newsletters) {
            $excel->sheet('TestSheet', function ($sheet) use ($newsletters) {

                // Our first sheet
                $sheet->fromArray($newsletters, null, 'A1', false, false)
                    ->prependRow(1, array(
                        'ردیف',
                        'نام',
                        'نام خانوادگی',
                        'موبایل',
                        'ایمیل',

                    ))->setStyle(array(
                        'font' => array(
                            'name' => 'Tahoma',
                            'size' => 12,
                            'bold' => false
                        )
                    ));

            });
        })->export('xls');
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->back()->with('msg', 'حذف با موفقیت انجام شد.');
    }
}
