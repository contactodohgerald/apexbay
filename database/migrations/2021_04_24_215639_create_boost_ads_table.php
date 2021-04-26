<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoostAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boost_ads', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();

            $table->string('user_unique_id')->nullable();
            $table->string('phone_number');
            $table->string('add_image');
            $table->text('description')->nullable();
            $table->string('status')->default('on');

            $table->softDeletes('deleted_at', 6);
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
        Schema::dropIfExists('boost_ads');
    }
}
