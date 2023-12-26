<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('schedule')->nullable();
            $table->string('recurring_type')->nullable();
            $table->string('period')->nullable();
            $table->tinyInteger('project')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            $table->tinyInteger('allocated_user')->nullable();
            $table->string('status')->nullable();
            $table->string('est_hour')->nullable();
            $table->string('est_minute')->nullable();
            $table->string('priority')->nullable();
            $table->string('task_type')->nullable();
            $table->longText('file')->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();
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
};
