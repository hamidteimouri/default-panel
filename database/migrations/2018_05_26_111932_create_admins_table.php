<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('father')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('telegram')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('mobile', 64)->nullable();
            $table->string('national_code', 32)->nullable();
            $table->string('slug')->nullable();
            $table->string('tel', 64)->nullable();
            $table->string('fax', 64)->nullable();
            $table->boolean('receive_newsletter')->default(0);
            $table->boolean('activated')->default(1);
            $table->string('activation_code')->nullable();
            $table->enum('type', ['super_admin', 'admin', 'other'])->default('admin');
            $table->unsignedInteger('role_id')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
        // insert some data
        $pass = Hash::make("123456");
        $time = \Carbon\Carbon::now();
        $data = array(
            array('name' => 'حمید', 'family' => 'تیموری', 'email' => 'me@hamidteimouri.com', 'password' => $pass, 'type' => 'super_admin', 'website' => 'https://hamidteimouri.com', 'created_at' => $time),
            array('name' => 'علیرضا', 'family' => 'کرمی', 'email' => 'alireza.karami@live.com', 'password' => $pass, 'type' => 'super_admin', 'website' => 'http://test.ir', 'created_at' => $time),
            array('name' => 'یاسر', 'family' => 'کارگری', 'email' => 'yaserkargari@gmail.com', 'password' => $pass, 'type' => 'super_admin', 'website' => 'http://yaserkargari.ir', 'created_at' => $time),
        );
        \DB::table('admins')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
