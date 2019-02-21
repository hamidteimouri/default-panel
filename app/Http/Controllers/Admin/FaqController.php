<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Requests\Admin\FaqRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{

    public $title_fa = 'پرسش و پاسخ';
    public $titles_fa = 'سوالات متدوال';
    public $route = 'faq';
    protected $paginate = 20;

//    protected $thumbnails = ['385/200'];

    public function index()
    {
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "$this->title_fa"],
        ];
        $data['objects'] = Faq::paginate($this->paginate);
        return view("admin.faq.index", compact("items", 'data'));
    }

    public function create()
    {
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "$this->title_fa"],
            ['route' => route("admin.{$this->route}.create"), 'title' => "افزودن $this->title_fa"],
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        return view("admin.faq.create", compact('items', 'data'));
    }

    public function store(FaqRequest $request)
    {
        $input = $request->all();

        $faq = new Faq();
        $faq->question = $input['question'];
        $faq->answer = $input['answer'];
        $faq->save();

        return redirect()->back()->with('msg', 'سوال با موفقیت افزوده شد.');

    }

    public function edit(Faq $faq)
    {
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "$this->title_fa"],
            ['route' => route("admin.{$this->route}.update", $faq->id), 'title' => "ویرایش $this->title_fa"],
        ];
        $data['object'] = $faq;
        return view("admin.faq.edit", compact("data", 'items'));
    }

    public function update(Faq $faq, FaqRequest $request)
    {
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        return redirect()->back()->with('msg', 'ویرایش با موفقیت انجام شد.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with('msg', 'حذف با موفقیت انجام شد.');
    }
}
