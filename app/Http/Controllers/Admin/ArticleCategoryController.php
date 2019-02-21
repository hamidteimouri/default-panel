<?php

namespace App\Http\Controllers\Admin;

use App\ArticleCategory;
use App\Http\Requests\Admin\ArticleCategoryRequest;
use App\Http\Controllers\Controller;

class ArticleCategoryController extends Controller
{
    public $title_fa = 'دسته بندی مقاله';
    public $titles_fa = 'دسته بندی های مقاله';
    public $route = 'articleCategory';
    public $preRoute = 'admin';
    public $folder = 'article_category';
    public $preFolder = 'admin';
    protected $paginate = 20;
    protected $thumbnails = ['385/200'];

    public function index()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => "$this->titles_fa"]
        ];
        $data['objects'] = ArticleCategory::latest()->paginate($this->paginate);
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

    public function store(ArticleCategoryRequest $request)
    {
        $object = new ArticleCategory();
        $object->title = $request->input('title');
        $object->save();
        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');
    }

    public function edit(ArticleCategory $articleCategory)
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => "{$this->titles_fa}"],
            ['route' => route("$this->preRoute.$this->route.edit", $articleCategory->id), 'title' => 'ویرایش دسته بندی'],
        ];
        $data['object'] = $articleCategory;
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        return view("admin.article_category.edit", compact("data", 'items'));
    }

    public function update(ArticleCategoryRequest $request, ArticleCategory $articleCategory)
    {
        $articleCategory->update([
            'title' => $request->input('title')
        ]);
        return redirect()->back()->with('msg', 'ویرایش با موفقیت انجام شد.');
    }

    public function destroy(ArticleCategory $articleCategory)
    {
        if (!$articleCategory->articles->isEmpty())
            $articleCategory->articles()->delete();

        $articleCategory->delete();
        return redirect()->back()->with('msg', 'حذف با موفقیت انجام شد.');
    }
}
