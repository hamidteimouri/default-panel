<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TagRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public $title_fa = 'تگ';
    public $titles_fa = 'تگ ها';
    public $route = 'tag';
    public $folder = 'tag';
    protected $paginate = 20;
    protected $thumbnails = ['105/70'];

    public function index()
    {
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "$this->titles_fa"],
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        $data['objects'] = Tag::paginate($this->paginate);
        //$data['objects']->load('category');
        return view("admin.$this->folder.index", compact('data', 'items'));
    }

    public function create()
    {
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "$this->titles_fa"],
            ['route' => route("admin.{$this->route}.create"), 'title' => "افزودن $this->title_fa"],
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        return view("admin.$this->folder.create", compact('data', 'items'));
    }

    public function store(TagRequest $request)
    {
        $input = $request->all();
        $object = Tag::create([
            'title' => $input['title'],
        ]);

        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');
    }

    public function edit(Tag $tag)
    {
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "$this->titles_fa"],
            ['route' => route("admin.{$this->route}.edit", $tag->id), 'title' => "ویرایش $this->title_fa"],
        ];
        $data['object'] = $tag;
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        return view("admin.$this->folder.edit", compact('data', 'items'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $input = $request->all();
        #$user = auth()->guard('admin')->user();
        $tag->update([
            'title' => $input['title'],
        ]);

        return redirect()->back()->with('msg', 'ویرایش با موفقیت انجام شد.');

    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back()->with('msg', 'حذف با موفقیت انجام شد.');
    }
}
