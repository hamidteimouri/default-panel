<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
           $table->increments('id');
            $table->unsignedInteger('writer_id')->nullable();        // writer of article
            $table->string('category_id')->nullable();
            $table->string('title', 512)->nullable();
            $table->string('source', 512)->nullable();
            $table->string('link', 512)->nullable();
            $table->string('summary', 1028)->nullable();
            $table->text('description')->nullable();
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->unsignedInteger('hit')->default(0); // views

            $table->unsignedInteger('position')->default(1);
            $table->boolean('display')->default(1);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
