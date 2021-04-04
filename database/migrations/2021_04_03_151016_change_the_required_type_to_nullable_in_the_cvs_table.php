<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTheRequiredTypeToNullableInTheCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cvs', function (Blueprint $table) {
            //
            $table->string('full_name')->nullable()->change(); 
            $table->string('gender')->nullable()->change(); 
            $table->string('marital_status')->nullable()->change(); 
            $table->string('age')->nullable()->change(); 
            $table->string('work_experience')->nullable()->change(); 
            $table->string('job_type')->nullable()->change(); 
            $table->string('studying_status')->nullable()->change(); 
            $table->string('education')->nullable()->change(); 
            $table->string('views')->default(0)->nullable()->change();
            $table->string('price1')->nullable()->change(); 
            $table->string('price2')->nullable()->change(); 
            $table->string('status')->default('pending')->nullable()->change();
            $table->string('cover_image')->default('avater.png')->nullable()->change();
            $table->string('cv_category_unique_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cvs', function (Blueprint $table) {
            //
        });
    }
}
