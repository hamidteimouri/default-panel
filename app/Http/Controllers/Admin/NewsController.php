<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NewsRequest;
use App\News;
use App\NewsCategory;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public $title_fa = 'خبر';
    public $titles_fa = 'اخبار';
    public $route = 'news';
    public $preRoute = 'admin';
    public $folder = 'news';
    public $preFolder = 'admin';
    protected $paginate = 20;
    protected $thumbnails = ['385/200'];

    public function index()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => "$this->titles_fa"]
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        $data['objects'] = News::latest()->paginate($this->paginate);
        $data['objects']->load('category');
        return view("$this->preFolder.$this->folder.index", compact('data', 'items'));
    }

    public function create()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => "{$this->titles_fa}"],
            ['route' => route("$this->preRoute.$this->route.create"), 'title' => "افزودن {$this->title_fa}"],
        ];
        $data['categories'] = NewsCategory::visible()->latest()->get(['id', 'title']);
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        return view("$this->preFolder.$this->folder.create", compact("data", 'items'));
    }

    public function store(NewsRequest $request)
    {

        if (!$request->has('display')) {
            $request->request->add(["display" => "0"]);
        }

        $input = $request->all();
        $user = auth()->guard("admin")->user();

        $object = new News();
        $object->display = $input['display'];
        $object->category_id = $input['category'];
        $object->title = $input['title'];
        $object->writer_id = $user->id;
        $object->link = $input['link'];
        $object->source = $input['source'];
        $object->summary = $input['summary'];
        $object->description = $input['description'];
        $object->save();

        if ($request->hasFile('pic')) {
            $f = $request->file('pic');
            $cropper = $request->input('cropper');
            imgAttachmentCreate($object, $f, 'main_img', 'main_img', $cropper, $this->thumbnails);
        }
        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');
    }

    public function edit(News $news)
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => "$this->titles_fa"],
            ['route' => route("$this->preRoute.$this->route.edit", $news->id), 'title' => "ویرایش $this->title_fa"],
        ];
        $data['object'] = $news;
        $data['categories'] = NewsCategory::visible()->latest()->get(['id', 'title']);
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        return view('admin.news.edit', compact('data', 'items'));
    }

    public function update(NewsRequest $request, News $news)
    {
        if (!$request->has('display')) {
            $request->request->add(["display" => "0"]);
        }
        $input = $request->all();
        //$user = auth()->guard("admin")->user();

        $object = $news;
        $object->display = $input['display'];
        $object->category_id = $input['category'];
        $object->title = $input['title'];
        $object->link = $input['link'];
        $object->source = $input['source'];
        $object->summary = $input['summary'];
        $object->description = $input['description'];
        $object->save();

        if ($request->hasFile('pic')) {
            $f = $request->file('pic');
            $cropper = $request->input('cropper');
            imgAttachmentUpdate($object, $f, 'main_img', 'main_img', $cropper, $this->thumbnails);
        }
        return redirect()->back()->with('msg', 'ویرایش با موفقیت انجام شد.');

    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->back()->with('msg', 'حذف با موفقیت انجام شد.');
    }
}
