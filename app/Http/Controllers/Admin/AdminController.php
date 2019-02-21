<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Requests\Admin\AdminRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public $title_fa = 'مدیر';
    public $titles_fa = 'مدیران';
    public $route = 'admin';
    public $preRoute = 'admin';
    public $folder = 'admin';
    public $preFolder = 'admin';
    protected $paginate = 20;
    protected $thumbnails = ['40/40', '125/125'];

    public function index()
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => $this->titles_fa],
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;

        $q = Admin::query();
        if (auth()->guard("admin")->user()->type != 'super_admin') {
            $q->where("type", '!=', 'super_admin');
        }
        $data['objects'] = $q->latest()->paginate($this->paginate);

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
        $data['roles'] = Role::where('guard_name', 'admin')->where('name', '<>', 'super_admin')->get();


        return view("$this->preFolder.$this->folder.create", compact('data', 'items'));
    }

    public function store(AdminRequest $request)
    {
        if (!$request->has('password')) {
            $request->request->add(['password' => '123456']);
        }
        $input = $request->all();
        $object = Admin::create([
            'name' => $input['name'],
            'family' => $input['family'],
            'email' => $input['email'],
            'password' => $input['password'],
        ]);
        $object->assignRole($request->role);

        if ($request->hasFile('pic')) {
            $f = $request->file('pic');
            $cropper = $request->input('cropper');
            imgAttachmentCreate($object, $f, 'user', 'profile', $cropper, $this->thumbnails);
        }
        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');

    }

    public function edit(Admin $admin)
    {
        $items = [
            ['route' => route("$this->preRoute.$this->route.index"), 'title' => $this->titles_fa],
            ['route' => route("$this->preRoute.$this->route.edit", $admin->id), 'title' => "ویرایش $this->title_fa"],
        ];
        $data['object'] = $admin;
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;

        $data['roles'] = Role::where('guard_name', 'admin')->where('name', '<>', 'super_admin')->get();
        $userRoles = $admin->getRoleNames();

        $user_roles = array();
        foreach ($userRoles as $userRole)
            $user_roles[] = $userRole;

        return view("$this->preFolder.$this->folder.edit", compact('items', 'data', 'roles', 'user_roles'));

    }

    public function update(Admin $admin, AdminRequest $request)
    {
        $input = $request->all();
        $admin->update([
            'name' => $input['name'],
            'family' => $input['family'],
            'email' => $input['email'],
            #'password' => $input['password'],
        ]);

        if (!$request->has("role")) {
            $arr = [];
            $request->request->add(['role' => $arr]);
        }
        if ($request->has("role")) {
            $roles = $request->role;

            app()['cache']->forget('spatie.permission.cache');

            $admin->syncRoles($roles);
        }


        if ($request->hasFile('pic')) {
            $f = $request->file('pic');
            $cropper = $request->input('cropper');
            imgAttachmentUpdate($admin, $f, 'user', 'profile', $cropper, $this->thumbnails);
        }
        return redirect()->back()->with('msg', 'ویرایش با موفقیت انجام شد.');

    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');
    }
}
