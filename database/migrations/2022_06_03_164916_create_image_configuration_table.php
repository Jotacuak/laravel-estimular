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
        Schema::create('image_configuration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entity', 255);
            $table->string('disk', 255);
            $table->string('directory', 255);
            $table->string('type', 255);
            $table->string('content', 255);
            $table->string('grid', 255);
            $table->string('content_accepted', 255);
            $table->string('extension_conversion');
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('quality');
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
        Schema::dropIfExists('image_configuration');
    }
};
