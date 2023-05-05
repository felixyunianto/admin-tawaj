<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('title_indo');
            $table->string('title_arab')->nullable();
            $table->text('content_indo');
            $table->text('content_arab');
            $table->text('content_latin');
            $table->text('url_to')->nullable();
            $table->text('image')->nullable();
            $table->bigInteger('content_category_id')->unsigned();

            $table->foreign('content_category_id')->references('id')->on('content_categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('content');
    }
}
