<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\ArticleCategory;
use App\Http\Requests\Admin\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public $title_fa = 'مقاله';
    public $titles_fa = 'مقالات';
    public $route = 'article';
    public $preRoute = 'admin';
    public $folder = 'article';
    public $preFolder = 'admin';
    protected $paginate = 30;
    protected $thumbnails = ['385/200'];

    public function index()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => $this->titles_fa],
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        $data['objects'] = Article::latest()->paginate($this->paginate);
        return view('admin.article.index', compact('data', 'items'));
    }

    public function create()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => $this->titles_fa],
            ['route' => route("$this->preRoute.$this->route.create"), 'title' => "افزودن $this->title_fa"],
        ];

        $data['categories'] = ArticleCategory::visible()->latest()->get();
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;

        return view("$this->preFolder.$this->folder.create", compact('data', 'items'));
    }

    public function store(ArticleRequest $request)
    {
        $input = $request->all();
        $user = auth()->guard("admin")->user();

        $object = new Article();
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

    public function edit(Article $article)
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => $this->titles_fa],
            ['route' => route("$this->preRoute.$this->route.edit", $article->id), 'title' => "ویرایش $this->title_fa"],
        ];
        $data['categories'] = ArticleCategory::visible()->get();
        $data['object'] = $article;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        return view("$this->preFolder.$this->folder.edit", compact("data", 'items'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $input = $request->all();

        $object = $article;
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

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with('msg', 'حذف با موفقیت انجام شد.');
    }
}
