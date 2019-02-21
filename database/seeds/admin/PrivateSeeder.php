<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PrivateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            // something
            ['guard_name' => 'admin', 'name' => 'something index', 'description' => 'لیست چیزها'],
            ['guard_name' => 'admin', 'name' => 'something show', 'description' => 'مشاهده یک چیزی'],
            ['guard_name' => 'admin', 'name' => 'something update', 'description' => 'آپدیت یک چیزی'],
            ['guard_name' => 'admin', 'name' => 'something delete', 'description' => 'حذف یک چیزی'],
            ['guard_name' => 'admin', 'name' => 'something create', 'description' => 'افزودن یک چیزی'],

            // ...
        ];

        foreach ($arr as $item) {
            Permission::create($item);
        }
    }
}
