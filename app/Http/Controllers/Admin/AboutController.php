<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Requests\Admin\AboutRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public $title_fa = 'درباره ما';
    public $titles_fa = 'متن های درباره ما';
    public $route = 'about';
    protected $paginate = 8;


    public function edit()
    {
        $items = [
            ['route' => route("admin.{$this->route}.edit"), 'title' => "ویرایش $this->title_fa"]
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        $data['object'] = About::firstOrFail();
        return view("admin.about.edit", compact("data", 'items'));
    }

    public function update(AboutRequest $request)
    {
        $about = About::first();
        $about->update([
            'description' => $request->input("description")
        ]);
        return redirect()->back()->with('msg', 'ویرایش با موفقیت انجام شد.');
    }
}
