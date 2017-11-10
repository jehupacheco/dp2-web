<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectivesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'objectives';

    /**
     * Run the migrations.
     * @table objectives
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('starts_at');
            $table->timestamp('ends_at');
            $table->double('goal');
            $table->double('value');
            $table->unsignedInteger('sensor_id');
            $table->unsignedInteger('client_id');

            $table->index(["client_id"], 'fk_objectives_clients1_idx');

            $table->index(["sensor_id"], 'fk_objectives_sensors1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('sensor_id', 'fk_objectives_sensors1_idx')
                ->references('id')->on('sensors')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('client_id', 'fk_objectives_clients1_idx')
                ->references('id')->on('clients')
                ->onDelete('no action')
                ->onUpdate('no action');
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
