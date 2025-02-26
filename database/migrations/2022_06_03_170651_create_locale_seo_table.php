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
        Schema::create('locale_seo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable(true);
            $table->string('language',64);
            $table->string('group', 255)->index();
            $table->string('key', 255);
            $table->string('subdomain', 255)->nullable(true);
            $table->string('url', 255)->nullable(true);
            $table->string('keywords', 255)->nullable(true);
            $table->string('description', 255)->nullable(true);
            $table->boolean('redirection')->nullable(true);
            $table->boolean('menu')->nullable(true);
            $table->string('changefreq',255)->nullable(true);
            $table->decimal('priority')->nullable(true);
            $table->boolean('sitemap')->nullable(true);
            $table->boolean('active');
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
        Schema::dropIfExists('locale_seo');
    }
};
