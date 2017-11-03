<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'vehicles';

    /**
     * Run the migrations.
     * @table vehicles
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('mac', 45)->nullable()->default(null);
            $table->unsignedInteger('organization_id');
            $table->string('plate', 45)->nullable()->default(null);
            $table->string('description', 225)->nullable()->default(null);
            $table->float('price')->default('0');

            $table->index(["organization_id"], 'fk_vehicles_organizations1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('organization_id', 'fk_vehicles_organizations1_idx')
                ->references('id')->on('organizations')
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
