<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('ad_files')){
            Schema::create('ad_files', function (Blueprint $table) {
                $table->id();
    
                $table->string('unique_id')->unique();
                $table->string('ad_unique_id');
                $table->string('ad_images')->nullable();
                $table->string('ad_videos')->nullable();
    
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
        Schema::dropIfExists('ad_files');
    }
}
