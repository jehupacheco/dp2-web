<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamp('ends_at');
            $table->softDeletes();
            $table->nullableTimestamps();
            $table->unsignedInteger('client_id');

            $table->index(["client_id"], 'fk_reminders_clients1_idx');

            $table->foreign('client_id', 'fk_reminders_clients1_idx')
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
        Schema::dropIfExists('reminders');
    }
}
