<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_categories', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('cv_category_title')->nullable();
            $table->text('cv_desc')->nullable();
            $table->string('status')->default('confirm');
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
        Schema::dropIfExists('cv_categories');
    }
}
