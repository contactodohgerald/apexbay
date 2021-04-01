<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('cv_comments')){
            Schema::create('cv_comments', function (Blueprint $table) {
                $table->id();
                $table->string('unique_id')->unique();
    
                $table->string('user_unique_id');
                $table->string('cv_unique_id');
                $table->string('status')->default('pending');
                $table->text('comment');
    
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
        Schema::dropIfExists('cv_comments');
    }
}
