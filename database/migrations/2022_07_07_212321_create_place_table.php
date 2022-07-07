<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('place', 30)->comment('場所');
            $table->string('detail', 255)->comment('詳細');
            // falseは行ったことがない場所　trueは行った場所を表す
            $table->boolean('place_flg')->default(false)->comment('場所フラグ');
            // userのidを参照. userが消えるとtaskも消える
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_models');
    }
};
