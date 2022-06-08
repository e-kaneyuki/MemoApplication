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
        Schema::create('subscripts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('subscript')->comment('サブスク');
            $table->string('memo')->comment('備考欄');
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
        Schema::dropIfExists('subscripts');
    }
};
