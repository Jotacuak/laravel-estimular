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
        Schema::create('menu_item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('custom_url')->nullable();
            $table->integer('private')->nullable();
            $table->integer('order')->default(0);
            $table->integer('menu_id')->unsigned();
            $table->integer('locale_seo_id')->nullable(); 
            $table->integer('locale_slug_seo_id')->nullable(); 
            $table->integer('parent_id')->nullable(); 
            $table->timestamps();
        });

        Schema::table('menu_item', function($table) {
            $table->foreign('menu_id')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_item');
    }
};
