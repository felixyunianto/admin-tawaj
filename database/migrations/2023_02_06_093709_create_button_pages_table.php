<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButtonPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('button_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title2');
            $table->text('deskripsi');
            $table->string('link_type');
            $table->text('link');
            $table->integer('order')->nullable();
            $table->bigInteger("button_page_id")->unsigned()->nullable();
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
        Schema::dropIfExists('button_pages');
    }
}
