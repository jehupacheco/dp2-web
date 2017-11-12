<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileImgToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('profile_img_url')->default('http://s3.amazonaws.com/nvest/Blank_Club_Website_Avatar_Gray.jpg');
            $table->string('gender', 1)->default('M');
            $table->float('height')->default(0);
            $table->string('heart_illness')->default('');
            $table->float('heart_frecuency')->default(0);
            $table->json('tools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn(['profile_img_url', 'gender', 'height', 'heart_illness', 'heart_frecuency', 'tools']);
        });
    }
}
