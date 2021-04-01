<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileTypeToAdFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_files', function (Blueprint $table) {
            //
            $table->renameColumn('ad_images', 'ad_files');
            $table->dropColumn('ad_videos');
            $table->string('ad_files_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_files', function (Blueprint $table) {
            //
        });
    }
}
