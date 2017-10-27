<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'travels';

    /**
     * Run the migrations.
     * @table travels
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('started_at');
            $table->timestamp('ended_at')->nullable()->default(null);
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('vehicle_id');

            $table->index(["vehicle_id"], 'fk_travels_vehicles1_idx');

            $table->index(["client_id"], 'fk_travels_clients1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('client_id', 'fk_travels_clients1_idx')
                ->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('vehicle_id', 'fk_travels_vehicles1_idx')
                ->references('id')->on('vehicles')
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
