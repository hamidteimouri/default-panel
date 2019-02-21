<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public $thumbnails = ['100/200', '20/20'];
    public $title_fa = 'اسلایدر';
    public $titles_fa = 'اسلایدرها';
    public $route = 'slider';
    protected $paginate = 10;

    public function index()
    {
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "{$this->titles_fa}"],
        ];
        $data['objects'] = Slider::paginate($this->paginate);
        $data['titles_fa'] = $this->titles_fa;
        $data['title_fa'] = $this->title_fa;
        $data['route'] = $this->route;
        return view("admin.slider.index", compact("data", 'items'));
    }

    public function create()
    {
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "{$this->titles_fa}"],
            ['route' => route("admin.{$this->route}.create"), 'title' => "افزودن {$this->title_fa}"],
        ];
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        return view("admin.slider.create", compact("items", 'data'));

    }

    public function store(SliderRequest $request)
    {
        if (!$request->has('pic')) {
            return redirect()->back()->withInput()->with('err', 'انتخاب عکس الزامی است.');
        }
        $input = $request->all();
        $slider = new Slider();

        if ($request->has('title'))
            $slider->title = $input['title'];
        if ($request->has('link'))
            $slider->link = $input['link'];
        if ($request->has('description'))
            $slider->description = $input['description'];

        $slider->save();

        if ($request->has('pic')) {
            $f = $request->file('pic');
            $cropper = $request->input('cropper');
            imgAttachmentUpdate($slider, $f, 'main_img', 'main_img', $cropper, $this->thumbnails);
        }
        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');

    }

    public function edit(Slider $slider)
    {
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "{$this->titles_fa}"],
            ['route' => route("admin.{$this->route}.edit",$slider->id), 'title' => "ویرایش {$slider->title}"],
        ];
        $data['object'] = $slider;
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;

        return view("admin.slider.edit", compact("data",'items'));
    }

    public function update(Slider $slider, SliderRequest $request)
    {
        $input = $request->all();
        $slider->update([
            'title' => $input['title'],
            'link' => $input['link'],
//            'link_btn' => $input['link_btn'],
            'description' => $input['description'],
//            'target' => $input['target'],
        ]);
        if ($request->has('pic')) {
            $f = $request->file('pic');
            $cropper = $request->input('cropper');
            imgAttachmentUpdate($slider, $f, 'main_img', 'main_img', $cropper, $this->thumbnails);
        }
        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back()->with('msg', 'حذف با موفقیت انجام شد.');
    }
}
