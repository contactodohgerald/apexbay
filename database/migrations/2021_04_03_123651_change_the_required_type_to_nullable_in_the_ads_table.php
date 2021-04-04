<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTheRequiredTypeToNullableInTheAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            //
            $table->string('ad_title')->nullable()->change(); 
            $table->text('ad_desc')->nullable()->change(); 
            $table->string('target_country')->nullable()->change(); 
            $table->string('target_state')->nullable()->change(); 
            $table->string('business_phone')->nullable()->change(); 
            $table->string('ad_category_unique_id')->nullable()->change(); 
            $table->decimal('balance',13,2)->default(0)->nullable()->change();
            $table->string('views')->default(0)->nullable()->change();
            $table->string('status')->default('pending')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            //
        });
    }
}
