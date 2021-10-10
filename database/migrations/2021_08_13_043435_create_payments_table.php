<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('paymentable_id')->nullable();
            $table->string('paymentable_type')->nullable();
            $table->string('payment_no',20)->nullable()->unique();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->double('amount')->nullable();
            $table->string('bill_code',20)->nullable();
            $table->string('status',20)->nullable();
            $table->datetime('paid_at')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
