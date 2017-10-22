<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientVehicleTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'client_vehicle';

    /**
     * Run the migrations.
     * @table client_vehicle
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('client_id');
            $table->unsignedInteger('vehicle_id');
            $table->timestamp('starts_at');
            $table->timestamp('finishes_at');

            $table->index(["client_id"], 'fk_clients_has_vehicles_clients1_idx');

            $table->index(["vehicle_id"], 'fk_clients_has_vehicles_vehicles1_idx');


            $table->foreign('client_id', 'fk_clients_has_vehicles_clients1_idx')
                ->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('vehicle_id', 'fk_clients_has_vehicles_vehicles1_idx')
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
