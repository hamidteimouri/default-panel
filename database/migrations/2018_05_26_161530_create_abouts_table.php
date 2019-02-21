<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 512)->nullable(); // Title
            $table->text('description')->nullable();
            $table->string('summary', 1024)->nullable(); // summary of company
            $table->string('slogan', 512)->nullable();  // slogan of company

            $table->unsignedInteger('position')->default(1);
            $table->boolean('display')->default(1);

            $table->softDeletes();
            $table->timestamps();
        });
        $time = Carbon\Carbon::now();
        $data = array(
            array('title' => 'nothing', 'description' => 'it is test', 'summary' => 'test again', 'slogan' => 'test slogan', 'created_at' => $time),
        );
        \DB::table('abouts')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
