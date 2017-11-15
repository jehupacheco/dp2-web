<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'positions';

    /**
     * Run the migrations.
     * @table positions
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('latitude')->nullable()->default('0');
            $table->float('longitude')->nullable()->default('0');
            $table->unsignedInteger('vehicle_id');
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->index(["vehicle_id"], 'fk_positions_vehicles1_idx');


            $table->foreign('vehicle_id', 'fk_positions_vehicles1_idx')
                ->references('id')->on('vehicles')
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
