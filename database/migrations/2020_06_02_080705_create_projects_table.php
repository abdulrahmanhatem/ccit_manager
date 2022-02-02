<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('des')->nullable();
            $table->string('technologies')->nullable();
            $table->string('services')->nullable();
            $table->integer('user_id');
            $table->smallInteger('duration')->nullable();
            $table->smallInteger('progress')->default(0);
            $table->smallInteger('priority')->default(0);
            $table->integer('earnings')->default(0);
            $table->integer('expenses')->default(0);
            $table->integer('user_id');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('actual_date');
            $table->string('manager_id')->nullable();
            $table->string('team')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
