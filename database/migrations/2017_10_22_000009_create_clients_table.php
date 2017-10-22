<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'clients';

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
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->unsignedInteger('organization_id')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('lastname')->nullable()->default(null);
            $table->string('phone', 45)->nullable()->default(null);

            $table->index(["organization_id"], 'fk_clients_organizations1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('organization_id', 'fk_clients_organizations1_idx')
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
