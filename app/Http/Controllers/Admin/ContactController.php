<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ContactRequest;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public $title_fa = 'تماس با ما';
    public $titles_fa = 'اطلاعات تماس با ما';
    public $route = 'contact';
    protected $paginate = 20;

    public function edit()
    {
        $items = [
            ['route' => route("admin.{$this->route}.edit"), 'title' => "ویرایش {$this->titles_fa}"]
        ];
        $data['objects'] = Setting::visible()->where('section', 'contact-us')->get();
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        return view('admin.contact.edit', compact('data', 'items'));
    }

    public function update(ContactRequest $request, Setting $setting)
    {

        $input = $request->all();
        foreach ($input as $name => $value) {
            $setting->where('name', $name)->update(['value' => $value]);
        }
        return redirect()->back()->with('msg', 'ویرایش اطلاعات با موفقیت انجام شد.');

    }
}
