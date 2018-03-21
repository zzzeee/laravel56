<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id')->comment('博客id');
            $table->string('title', 100)->default('')->comment('标题');
            $table->text('content')->comment('内容');
            $table->integer('user_id')->unsigned()->comment('发表的用户id');
            $table->timestamp('created_at')->useCurrent()->comment('添加时间');
            $table->timestamp('updated_at')->useCurrent()->comment('更新时间');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
