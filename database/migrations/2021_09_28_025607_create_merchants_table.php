<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('merchant_no',20)->unique();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_no',20)->nullable();
            $table->string('address')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city',50)->nullable();
            $table->string('postcode',5)->nullable();
            $table->string('state',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('bank_name', 60)->nullable();
            $table->string('account_holder_name', 60)->nullable();
            $table->string('account_no', 30)->nullable();
            $table->string('image_url')->nullable();
            $table->string('status',20)->nullable();
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
        Schema::dropIfExists('merchants');
    }
}
