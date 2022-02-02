<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('team_members');
            $table->integer('project_id');
            $table->string('start_at')->nullable();
            $table->string('end_at')->nullable();
            $table->string('des')->nullable();
            $table->tinyInteger('can_view')->default(0);
            $table->tinyInteger('status')->default(0); 
            $table->tinyInteger('marked')->default(0); 
            $table->tinyInteger('trash')->default(0); 
            $table->string('docs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
