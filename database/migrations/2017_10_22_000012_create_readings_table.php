<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'readings';

    /**
     * Run the migrations.
     * @table readings
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('travel_id');
            $table->unsignedInteger('sensor_id');
            $table->timestamp('created_at')->nullable()->default(null);

            $table->index(["travel_id"], 'fk_readings_travels1_idx');

            $table->index(["sensor_id"], 'fk_readings_sensors1_idx');


            $table->foreign('travel_id', 'fk_readings_travels1_idx')
                ->references('id')->on('travels')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('sensor_id', 'fk_readings_sensors1_idx')
                ->references('id')->on('sensors')
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
