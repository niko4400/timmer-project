<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $date = date("Y/m/d");
            $table->increments('id');
            $table->string('name') ;
            $table->string('technology')->notnullable();
            $table->integer('user_id')->unsigned();
            $table->Date('project_start')->default($date);
            $table->timestamp('last_update');
            $table->Date('project_end')->nullable();
            $table->integer('time')->default(0);
            $table->Date('deadline')->nullable();
            $table->text('description')->nullable();
        });
        DB::statement('ALTER TABLE `projects` MODIFY COLUMN `time` integer(30)');
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
