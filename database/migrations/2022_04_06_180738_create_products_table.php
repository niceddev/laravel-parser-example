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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedMediumInteger('price');
            $table->string('image_url');
            $table->text('description')->nullable();
            $table->string('brand');
            $table->foreignId('category_id');
            $table->string('original_id');
            $table->tinyInteger('service')->comment('Магазин-источник');
            $table->integer('bought')->comment('Кол-во покупок');
            $table->float('rating')->comment('Актуальность');
            $table->integer('boughtJmart');
            $table->integer('boughtMechta');
            $table->integer('boughtTechnodom');
            $table->integer('astana');
            $table->integer('almaty');
            $table->integer('shymkent');
            $table->integer('karaganda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
