<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NewsCategoryRequest;
use App\NewsCategory;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    public $title_fa = 'دسته بندی خبر';
    public $titles_fa = 'دسته بندی های خبر';
    public $route = 'newsCategory';
    public $preRoute = 'admin';
    public $folder = 'news_category';
    public $preFolder = 'admin';
    protected $paginate = 20;
    protected $thumbnails = ['385/200'];

    public function index()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => "$this->titles_fa"]
        ];
        $data['objects'] = NewsCategory::latest()->paginate($this->paginate);
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        return view("$this->preFolder.$this->folder.index", compact('data', 'items'));
    }

    public function create()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => "{$this->titles_fa}"],
            ['route' => route("$this->preRoute.$this->route.create"), 'title' => "افزودن {$this->title_fa}"],
        ];
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        return view("$this->preFolder.$this->folder.create", compact("data", 'items'));
    }

    public function store(NewsCategoryRequest $request)
    {
        $object = new NewsCategory();
        $object->title = $request->input('title');
        $object->save();
        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');
    }

    public function edit(NewsCategory $newsCategory)
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => "{$this->titles_fa}"],
            ['route' => route("$this->preRoute.$this->route.edit", $newsCategory->id), 'title' => 'ویرایش دسته بندی'],
        ];
        $data['object'] = $newsCategory;
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        return view("$this->preFolder.$this->folder.edit", compact("data", 'items'));
    }

    public function update(NewsCategoryRequest $request, NewsCategory $newsCategory)
    {
        $newsCategory->update([
            'title' => $request->input('title'),
        ]);
        return redirect()->back()->with('msg', 'ویرایش با موفقیت انجام شد.');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        if (!$newsCategory->newses->isEmpty())
            $newsCategory->newses()->delete();

        $newsCategory->delete();
        return redirect()->back()->with('msg', 'حذف با موفقیت انجام شد.');
    }
}
