<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->string('name')->nullable();
            $table->string('family')->nullable();     //haminjori
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('tel')->nullable();
            $table->string('message', 2048)->nullable();
            $table->enum('status', ['seen', 'unread', 'replied', 'other'])->default('unread');
            $table->enum('reply_by', ['sms', 'email', 'website', 'not_replied', 'other'])->default('not_replied');
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
        Schema::dropIfExists('messages');
    }
}
