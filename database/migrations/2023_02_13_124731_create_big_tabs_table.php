<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('big_tabs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text('description');
            $table->string('link_type');
            $table->text('link');
            $table->text('image')->nullable();
            $table->integer('type_button')->default(1);
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
        Schema::dropIfExists('big_tabs');
    }
}
