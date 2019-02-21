<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section')->nullable();
            $table->string('title'); // like: Developer's Email
            $table->string('name');  // like: email
            $table->string('value', 2048)->nullable(); // like: me@hamidteimouri.com
            $table->enum('type', ['string', 'file', 'bool', 'textarea'])->default('string');
            $table->boolean('display')->default(1);
            $table->unsignedInteger('position')->nullable();
            $table->timestamps();
        });

        // insert some data
        $time = Carbon\Carbon::now();
        $data = array(
            array('section' => 'contact-us', 'position' => '1', 'name' => 'lat', 'value' => '35.7725015', 'title' => 'نقشه', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '2', 'name' => 'long', 'value' => '51.376214', 'title' => 'نقشه', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '3', 'name' => 'address', 'value' => 'خیابان فلان', 'title' => 'آدرس', 'display' => 1, 'type' => 'textarea', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '4', 'name' => 'tel', 'value' => '02144113344', 'title' => 'تلفن', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '5', 'name' => 'tel2', 'value' => '02144113355', 'title' => 'تلفن دیگر', 'display' => 0, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '6', 'name' => 'fax', 'value' => '02144113355', 'title' => 'فکس', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '7', 'name' => 'fax2', 'value' => '02144113355', 'title' => 'فکس دیگر', 'display' => 0, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '8', 'name' => 'mobile', 'value' => '09120000000', 'title' => 'تلفن همراه', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),

            // social
            array('section' => 'contact-us', 'position' => '9', 'name' => 'telegram', 'value' => 'https://t.me/google', 'title' => 'تلگرام', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '10', 'name' => 'telegram_member', 'value' => '10K', 'title' => 'اعضای تلگرام', 'display' => 0, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '11', 'name' => 'instagram', 'value' => 'https://instagram.com/google', 'title' => 'اینستاگرام', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '12', 'name' => 'instagram_member', 'value' => '12K', 'title' => 'اعضای اینستاگرام', 'display' => 0, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '13', 'name' => 'facebook', 'value' => 'https://fb.com/google', 'title' => 'فیسبوک', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '14', 'name' => 'facebook_member', 'value' => '13K', 'title' => 'اعضای فیسبوک', 'display' => 0, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '15', 'name' => 'twitter', 'value' => 'https://twitter.com/google', 'title' => 'تویتتر', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '16', 'name' => 'twitter_member', 'value' => '14K', 'title' => 'اعضای تویتتر', 'display' => 0, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '17', 'name' => 'gp', 'value' => 'https://google.com/plus/google', 'title' => 'گوگل پلاس', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '18', 'name' => 'gp_member', 'value' => '18K', 'title' => 'اعضای گوگل پلاس', 'display' => 0, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '19', 'name' => 'whatsapp', 'value' => '+98912xxxxxxx', 'title' => 'واتساپ', 'display' => 1, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),
            array('section' => 'contact-us', 'position' => '20', 'name' => 'whatsapp_member', 'value' => '18K', 'title' => 'اعضای واتساپ', 'display' => 0, 'type' => 'string', 'created_at' => $time, 'updated_at' => $time),

        );
        \DB::table('settings')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
