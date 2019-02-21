<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public $title_fa = 'کاربر';
    public $titles_fa = 'کاربران';
    public $route = 'user';
    public $preRoute = 'admin';
    public $folder = 'user';
    public $preFolder = 'admin';
    protected $paginate = 20;
    protected $thumbnails = ['40/40', '125/125', '200/200'];

    public function index()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => $this->titles_fa],
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        $data['objects'] = User::orderBy("id", 'desc')->paginate($this->paginate);
        return view("$this->preFolder.$this->folder.index", compact('data', 'items'));
    }

    public function create()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => $this->titles_fa],
            ['route' => route("$this->preRoute.$this->route.create"), 'title' => "افزودن $this->title_fa"],
        ];

        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;

        return view("$this->preFolder.$this->folder.create", compact('data', 'items'));
    }

    public function store(UserRequest $request)
    {

        if (!$request->has('password')) {
            $request->request->add(['password' => '123456']);
        }

        $input = $request->all();

        $user = new User();
        $user->name = $input['name'];
        $user->family = $input['family'];
        $user->email = $input['email'];

        if ($request->has("national_code"))
            $user->national_code = $input['national_code'];
        if ($request->has("father"))
            $user->father = $input['father'];

        # BirthDate
        if ($request->has("day"))
            $user->day = $input['day'];
        if ($request->has("month"))
            $user->month = $input['month'];
        if ($request->has("year"))
            $user->year = $input['year'];

        if ($request->has("birth_date"))
            $user->birth_date = $input['birth_date'];

        # Marriage
        if ($request->has("marriage_day"))
            $user->marriage_day = $input['marriage_day'];
        if ($request->has("marriage_month"))
            $user->marriage_month = $input['marriage_month'];
        if ($request->has("marriage_year"))
            $user->marriage_year = $input['marriage_year'];

        if ($request->has("marriage_birth_date"))
            $user->marriage_birth_date = $input['marriage_birth_date'];

        if ($request->has("website"))
            $user->website = $input['website'];

        if ($request->has("address"))
            $user->address = $input['address'];

        if ($request->has("job"))
            $user->job = $input['job'];

        if ($request->has("job_title"))
            $user->job_title = $input['job_title'];

        if ($request->has("password"))
            $user->password = $input['password'];

        $user->save();

        if ($request->hasFile('pic')) {
            $f = $request->file('pic');
            $cropper = $request->input('cropper');
            imgAttachmentCreate($user, $f, 'user', 'profile', $cropper, $this->thumbnails);
        }
        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');

    }

    public function edit(User $user)
    {
        #return redirect()->back()->with('info', 'به زودی تکمیل میشود');
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => $this->titles_fa],
            ['route' => route("$this->preRoute.$this->route.edit", $user->id), 'title' => "ویرایش $this->title_fa"],
        ];
        $data['object'] = $user;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        return view("$this->preFolder.$this->folder.edit", compact("data", 'items'));
    }

    public function update(User $user, UserRequest $request)
    {
        $input = $request->all();
        $user->update([
            'name' => $input['name'],
            'family' => $input['family'],
            'email' => $input['email'],
            //            'password' => $input['password'],
        ]);

        if ($request->hasFile('pic')) {
            $f = $request->file('pic');
            $cropper = $request->input('cropper');
            imgAttachmentUpdate($user, $f, 'user', 'profile', $cropper, $this->thumbnails);
        }
        return redirect()->back()->with('msg', 'ویرایش با موفقیت انجام شد.');

    }
}
