<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            // news
            ['guard_name' => 'admin', 'name' => 'news index', 'description' => 'لیست اخبار'],
            ['guard_name' => 'admin', 'name' => 'news show', 'description' => 'مشاهده خبر'],
            ['guard_name' => 'admin', 'name' => 'news update', 'description' => 'آپدیت خبر'],
            ['guard_name' => 'admin', 'name' => 'news delete', 'description' => 'حذف خبر'],
            ['guard_name' => 'admin', 'name' => 'news create', 'description' => 'افزودن خبر'],

            // news category
            ['guard_name' => 'admin', 'name' => 'newsCategory index', 'description' => 'لیست دسته بندی های خبر'],
            ['guard_name' => 'admin', 'name' => 'newsCategory show', 'description' => 'مشاهده دسته بندی خبر'],
            ['guard_name' => 'admin', 'name' => 'newsCategory update', 'description' => 'آپدیت دسته بندی خبر'],
            ['guard_name' => 'admin', 'name' => 'newsCategory delete', 'description' => 'حذف دسته بندی خبر'],
            ['guard_name' => 'admin', 'name' => 'newsCategory create', 'description' => 'افزودن دسته بندی خبر'],

            // newsletter
            ['guard_name' => 'admin', 'name' => 'newsletter index', 'description' => 'مدیریت خبرنامه'],

            // article
            ['guard_name' => 'admin', 'name' => 'article index', 'description' => 'لیست مقالات'],
            ['guard_name' => 'admin', 'name' => 'article show', 'description' => 'مشاهده مقاله'],
            ['guard_name' => 'admin', 'name' => 'article update', 'description' => 'آپدیت مقاله'],
            ['guard_name' => 'admin', 'name' => 'article delete', 'description' => 'حذف مقاله'],
            ['guard_name' => 'admin', 'name' => 'article create', 'description' => 'افزودن مقاله'],

            // article category
            ['guard_name' => 'admin', 'name' => 'articleCategory index', 'description' => 'لیست دسته بندی های مقاله'],
            ['guard_name' => 'admin', 'name' => 'articleCategory show', 'description' => 'مشاهده دسته بندی مقاله'],
            ['guard_name' => 'admin', 'name' => 'articleCategory update', 'description' => 'آپدیت دسته بندی مقاله'],
            ['guard_name' => 'admin', 'name' => 'articleCategory delete', 'description' => 'حذف دسته بندی مقاله'],
            ['guard_name' => 'admin', 'name' => 'articleCategory create', 'description' => 'افزودن دسته بندی مقاله'],

            // FAQ
            ['guard_name' => 'admin', 'name' => 'faq index', 'description' => 'لیست faq'],
            ['guard_name' => 'admin', 'name' => 'faq show', 'description' => 'مشاهده faq'],
            ['guard_name' => 'admin', 'name' => 'faq update', 'description' => 'آپدیت faq'],
            ['guard_name' => 'admin', 'name' => 'faq delete', 'description' => 'حذف faq'],
            ['guard_name' => 'admin', 'name' => 'faq create', 'description' => 'افزودن faq'],

            // slider
            ['guard_name' => 'admin', 'name' => 'slider index', 'description' => 'لیست اسلایدرها'],
            ['guard_name' => 'admin', 'name' => 'slider show', 'description' => 'مشاهده اسلایدر'],
            ['guard_name' => 'admin', 'name' => 'slider update', 'description' => 'آپدیت اسلایدر'],
            ['guard_name' => 'admin', 'name' => 'slider delete', 'description' => 'حذف اسلایدر'],
            ['guard_name' => 'admin', 'name' => 'slider create', 'description' => 'افزودن اسلایدر'],

            // Tag
            ['guard_name' => 'admin', 'name' => 'tag index', 'description' => 'لیست برچسب ها'],
            ['guard_name' => 'admin', 'name' => 'tag show', 'description' => 'مشاهده برچسب'],
            ['guard_name' => 'admin', 'name' => 'tag update', 'description' => 'آپدیت برچسب'],
            ['guard_name' => 'admin', 'name' => 'tag delete', 'description' => 'حذف برچسب'],
            ['guard_name' => 'admin', 'name' => 'tag create', 'description' => 'افزودن برچسب'],

            // about us
            ['guard_name' => 'admin', 'name' => 'about edit', 'description' => 'فرم ویرایش درباره ما'],
            ['guard_name' => 'admin', 'name' => 'about update', 'description' => 'آپدیت درباره ما'],

            // contact us
            ['guard_name' => 'admin', 'name' => 'contact edit', 'description' => 'فرم ویرایش تماس با ما'],
            ['guard_name' => 'admin', 'name' => 'contact update', 'description' => 'آپدیت تماس با ما'],

            // setting
            ['guard_name' => 'admin', 'name' => 'setting index', 'description' => 'تنظیمات'],

            // admin
            ['guard_name' => 'admin', 'name' => 'admin index', 'description' => 'لیست مدیران'],
            ['guard_name' => 'admin', 'name' => 'admin show', 'description' => 'مشاهده مدیر'],
            ['guard_name' => 'admin', 'name' => 'admin update', 'description' => 'آپدیت مدیر'],
            ['guard_name' => 'admin', 'name' => 'admin delete', 'description' => 'حذف مدیر'],
            ['guard_name' => 'admin', 'name' => 'admin create', 'description' => 'افزودن مدیر'],

            // user
            ['guard_name' => 'admin', 'name' => 'user index', 'description' => 'لیست کاربران'],
            ['guard_name' => 'admin', 'name' => 'user show', 'description' => 'مشاهده کاربر'],
            ['guard_name' => 'admin', 'name' => 'user update', 'description' => 'آپدیت کاربر'],
            ['guard_name' => 'admin', 'name' => 'user delete', 'description' => 'حذف کاربر'],
            ['guard_name' => 'admin', 'name' => 'user create', 'description' => 'افزودن کاربر'],

            // Privacy and Law
            ['guard_name' => 'admin', 'name' => 'law index', 'description' => 'لیست قوانین سایت'],
            ['guard_name' => 'admin', 'name' => 'law show', 'description' => 'مشاهده قانون'],
            ['guard_name' => 'admin', 'name' => 'law update', 'description' => 'آپدیت قانون'],
            ['guard_name' => 'admin', 'name' => 'law delete', 'description' => 'حذف قانون'],
            ['guard_name' => 'admin', 'name' => 'law create', 'description' => 'افزودن قانون'],

            // Comment
            ['guard_name' => 'admin', 'name' => 'comment index', 'description' => 'لیست نظرات'],
            ['guard_name' => 'admin', 'name' => 'comment show', 'description' => 'مشاهده نظر'],
            ['guard_name' => 'admin', 'name' => 'comment update', 'description' => 'آپدیت نظر'],
            ['guard_name' => 'admin', 'name' => 'comment delete', 'description' => 'حذف نظر'],
            ['guard_name' => 'admin', 'name' => 'comment create', 'description' => 'افزودن نظر'],

            // Message
            ['guard_name' => 'admin', 'name' => 'message index', 'description' => 'لیست پیام های تماس با ما'],
            ['guard_name' => 'admin', 'name' => 'message show', 'description' => 'مشاهده پیام'],
            ['guard_name' => 'admin', 'name' => 'message update', 'description' => 'آپدیت پیام'],
            ['guard_name' => 'admin', 'name' => 'message delete', 'description' => 'حذف پیام'],
            ['guard_name' => 'admin', 'name' => 'message create', 'description' => 'افزودن پیام'],

            // Profile
            ['guard_name' => 'admin', 'name' => 'profile index', 'description' => 'پروفایل'],

        ];

        foreach ($arr as $item) {
            Permission::create($item);
        }
    }
}
