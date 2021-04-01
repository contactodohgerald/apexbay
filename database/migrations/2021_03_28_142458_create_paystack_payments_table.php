<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaystackPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('paystack_payments')){
            Schema::create('paystack_payments', function (Blueprint $table) {
                $table->id();
                $table->string('unique_id')->unique();
    
                $table->string('user_unique_id');
                $table->decimal('amount',13,4)->default(0);
                $table->string('currency')->nullable();
                $table->string('ip_address')->nullable();
                $table->string('reference')->nullable();
                $table->string('customer_code')->nullable();
                $table->string('channel')->nullable();
                $table->string('payment_type')->nullable();
                $table->string('status')->default('pending');
    
                $table->softDeletes('deleted_at', 6);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paystack_payments');
    }
}
