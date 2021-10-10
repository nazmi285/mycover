<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_no',20)->nullable()->unique();
            $table->string('name')->nullable();
            $table->integer('type')->nullable();
            $table->text('description')->nullable();
            $table->integer('stockable')->nullable()->default(0);
            $table->decimal('weight',8,3)->nullable();
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->double('promo_price')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('is_publish')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
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
}
