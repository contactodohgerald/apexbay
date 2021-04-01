<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('cvs')){
            Schema::create('cvs', function (Blueprint $table) {
                $table->id();
                $table->string('unique_id')->unique();
    
                $table->string('user_unique_id');
                $table->string('full_name');
                $table->string('gender');
                $table->string('marital_status');
                $table->string('age');
                $table->string('work_experience');
                $table->string('job_type');
                $table->string('studying_status');
                $table->string('education');
                $table->string('skills')->nullable();
                $table->string('language')->nullable();
                $table->string('certification')->nullable();
                $table->string('qualifications')->nullable();
                $table->string('native')->nullable();
                $table->string('phone_number')->nullable();
                $table->string('whatsapp_phone')->nullable();
                $table->string('telegram_username')->nullable();
                $table->string('views')->default(0);
                $table->string('price1');
                $table->string('price2');
                $table->text('additional_details')->nullable();
                $table->string('status')->default('pending');
                $table->string('cover_image');
    
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
        Schema::dropIfExists('cvs');
    }
}
