<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('ads')){
            Schema::create('ads', function (Blueprint $table) {
                $table->id();
    
                $table->string('unique_id')->unique();
                $table->string('ad_category_unique_id'); 
                $table->string('user_unique_id');
                $table->string('ad_title');
                $table->text('ad_desc');
                $table->string('website_link')->nullable();
                $table->string('views')->default(0);
                $table->string('target_country');
                $table->string('target_state');
                $table->string('physical_address')->nullable(); 
                $table->string('business_phone');
                $table->string('whatsapp_phone')->nullable(); 
                $table->string('telegram_username')->nullable(); 
                $table->decimal('balance', 13,2)->default(0);
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
        Schema::dropIfExists('ads');
    }
}
