<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectiveReadingTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'objective_reading';

    /**
     * Run the migrations.
     * @table objective_reading
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('reading_id');
            $table->integer('objective_id');

            $table->index(["reading_id"], 'fk_readings_has_objectives_readings1_idx');

            $table->index(["objective_id"], 'fk_readings_has_objectives_objectives1_idx');


            $table->foreign('reading_id', 'fk_readings_has_objectives_readings1_idx')
                ->references('id')->on('readings')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('objective_id', 'fk_readings_has_objectives_objectives1_idx')
                ->references('id')->on('objectives')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
