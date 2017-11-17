<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleAvailable extends Migration
{
    
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'vehicle_available';

    /**
     * Run the migrations.
     * @table clients
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_available');
            $table->integer('id_vehicle');
            $table->string('state')->default('Inhabilitado');
            $table->timestamp('starts_at');
            $table->timestamp('finishes_at');

            $table->softDeletes();


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
