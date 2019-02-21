<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public $title_fa = 'پیام تماس با ما';
    public $titles_fa = 'پیام های تماس با ما';
    public $route = 'message';
    public $folder = 'message';
    public $preFolder = 'admin';
    protected $paginate = 20;
    protected $thumbnails = ['385/200'];

    public function index()
    {
        $items = [
            ['route' => route("admin.$this->route.index"), 'title' => $this->titles_fa]
        ];
        $data['objects'] = Message::visible()->whereNull('parent_id')->get();
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        return view("$this->preFolder.$this->folder.index", compact("data", 'items'));
    }

    public function edit(Message $message)
    {

        $items = [
            ['route' => route("admin.$this->route.index"), 'title' => $this->titles_fa],
            ['route' => route("admin.$this->route.edit", $message->id), 'title' => 'مشاهده پیام']
        ];

        if ($message->status == 'unread') {
            $message->status = 'seen';
            $message->save();
        }


        $data['object'] = $message;
        $data['route'] = $this->route;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;


        $replies = Message::where('parent_id', $message->id)->get();
        return view("$this->preFolder.$this->folder.edit", compact("data", 'items', 'replies'));
    }

    public function update(Message $message)
    {

    }

    public function destroy(Message $message)
    {
        $message->children()->delete();
        $message->delete();
        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');
    }

    public function reply(Message $message, Request $request)
    {
        $replyType = $request->input('reply_type');


        $admin = auth()->guard('admin')->user();
        $obj = new Message();
        $obj->admin_id = $admin->id;
        $obj->message = $request->input('reply');
        $obj->parent_id = $message->id;
        $obj->status = 'seen';

        if ($replyType == 'email') {
            $message->reply_by = "email";
            $message->save();
            $obj->reply_by = 'email';

            // send email here ...
        }
        $obj->save();


        return redirect()->back()->with('msg', 'پاسخ با موفقیت ارسال شد');
    }
}
