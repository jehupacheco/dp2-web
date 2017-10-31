<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReadingsTableAddValueColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('readings', function (Blueprint $table) {
            $table->float('value')->default('0');
            $table->timestamp('updated_at')->nullable()->default(null);
            $table->timestamp('deleted_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('readings', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('value');
        });
    }
}
