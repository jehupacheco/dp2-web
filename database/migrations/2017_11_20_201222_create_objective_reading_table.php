<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectiveReadingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objective_reading', function (Blueprint $table) {
            $table->integer('reading_id')->unsigned();
            $table->integer('objective_id')->unsigned();

            $table->foreign('reading_id')
                ->references('id')
                ->on('readings')
                ->onDelete('cascade');

            $table->foreign('objective_id')
                ->references('id')
                ->on('objectives')
                ->onDelete('cascade');

            $table->primary(['reading_id', 'objective_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('objective_reading');
    }
}
