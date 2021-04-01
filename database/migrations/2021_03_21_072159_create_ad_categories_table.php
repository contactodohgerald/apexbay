<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('ad_categories')){
            Schema::create('ad_categories', function (Blueprint $table) {
                $table->id();
                $table->string('unique_id')->unique();
                $table->string('ad_category_title');
                $table->text('ad_desc')->nullable();
                $table->string('status')->default('confirm');
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
        Schema::dropIfExists('ad_categories');
    }
}
