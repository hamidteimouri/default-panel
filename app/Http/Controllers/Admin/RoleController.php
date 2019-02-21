<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public $title_fa = 'نقش';
    public $titles_fa = 'نقش ها';
    public $route = 'role';
    public $folder = 'role';
    public $preFolder = 'admin';
    public $preRoute = 'admin';
    protected $paginate = 30;

    public function index()
    {
        $items = [
            ['route' => route("$this->preRoute.{$this->route}.index"), 'title' => "$this->titles_fa"],
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;


        $q = Role::query();
        if (auth()->guard("admin")->user()->type != 'super_admin') {
            $q->where('name', '!=', 'super_admin');
        }
        $data['objects'] = $q->latest()->get();

        return view("$this->preFolder.$this->folder.index", compact('data', 'items'));
    }

    public function create()
    {
        $items = [
            ['route' => route("$this->preRoute.{$this->route}.create"), 'title' => "$this->titles_fa"],
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        $data['permissions'] = Permission::where('guard_name', 'admin')->get();

        return view("$this->preFolder.$this->folder.create", compact('data', 'items'));
    }

    public function store(RoleRequest $request)
    {
        $name = $request->input("name");
        $description = $request->input("description");
        $role = Role::create([
            'guard_name' => 'admin',
            'name' => $name, 'description' => $description
        ]);

        $permissions = $request->input("permission");
        // Assign permission to Role
        foreach ($permissions as $permission)
            $role->givePermissionTo($permission);

        return redirect()->route("$this->preRoute.$this->route.index")->with('msg', 'نقش مدیریتی جدید با موفقیت افزوده شد.');
    }

    public function edit(Role $role)
    {
        $items = [
            ['route' => route("$this->preRoute.{$this->route}.create"), 'title' => "$this->titles_fa"],
        ];
        $data['title_fa'] = $this->title_fa;
        $data['titles_fa'] = $this->titles_fa;
        $data['route'] = $this->route;
        $data['object'] = $role;


        $data['permissions'] = Permission::where('guard_name', 'admin')->get();
        $rolePermissions = $role->permissions;
        $role_permissions_id = array();

        foreach ($rolePermissions as $perm)
            $role_permissions_id[] = $perm->id;


        return view("$this->preFolder.$this->folder.edit", compact("data", 'items', 'permissions', 'role_permissions_id'));
    }

    public function update(Request $request, Role $role)
    {
        if ($request->description != null) {
            $role->description = $request->description;
            $role->save();
        }

        $permissions = $request->permission;

        app()['cache']->forget('spatie.permission.cache');

        $role->syncPermissions($permissions);

        return redirect()->back()->with('msg', 'اطلاعات با موفقیت ویرایش شد.');
    }

    public function destroy(Role $role)
    {
        $users = \App\Admin::role($role->name)->get();
        if (count($users) == 0) {
            $role->delete();
            return redirect()->back()->with('msg', 'عملیات با موفقیت انجام شد.');
        }
        return redirect()->back()->with('err', 'قبل از حذف، باید این نقش از مدیران گرفته شود.');
    }
}
