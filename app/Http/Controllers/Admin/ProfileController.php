<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Profile\InfoRequest;
use App\Http\Requests\Admin\Profile\PasswordRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    protected $paginate = 20;
    protected $route = "profile";
    protected $title_fa = "حساب کاربری";
    protected $thumbnails = ['40/40', '125/125'];

    public function index()
    {
        $items = [
            ['route' => route("admin.{$this->route}.index"), 'title' => "$this->title_fa"],
            ['route' => "", 'title' => "ویرایش"],
        ];
        $admin = auth()->guard('admin')->user();
        return view('admin.profile.index', compact('admin','items'));
    }

    public function updateInfo(InfoRequest $request)
    {
        $admin = auth()->guard('admin')->user();
        $admin->update([
            'name' => $request->input('name'),
            'family' => $request->input('family'),
            'mobile' => $request->input('mobile'),
            'national_code' => $request->input('national_code'),
            'website' => $request->input('website'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
            'telegram' => $request->input('telegram'),
        ]);
        if ($request->hasFile('pic')) {
            $f = $request->file('pic');
            $cropper = $request->input('cropper');
            imgAttachmentUpdate($admin, $f, 'user', 'profile', $cropper, $this->thumbnails);
        }
        return redirect()->back()->with('msg', 'ویرایش پروفایل با موفقیت انجام شد.');

    }

    public function updatePassword(PasswordRequest $request)
    {
        $admin = auth()->guard('admin')->user();
        if (!\Hash::check($request->input('current_password'), $admin->getAuthPassword())) {
            return redirect()->back()->with('err', 'رمز عبور فعلی اشتباه است.');
        }
        $admin->update([
            'password' => $request->input('password'),
        ]);
        return redirect()->back()->with('msg', 'ویرایش پروفایل با موفقیت انجام شد.');

    }
}
