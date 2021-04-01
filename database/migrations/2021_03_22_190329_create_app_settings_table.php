<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();

            $table->string('site_name')->nullable();
            $table->string('site_phone_number')->nullable();
            $table->string('site_whatsapp_number')->nullable();
            $table->string('site_telegram')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_mail')->nullable();
            $table->string('activation_fee')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();

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
        Schema::dropIfExists('app_settings');
    }
}
