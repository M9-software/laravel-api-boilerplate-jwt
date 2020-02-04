<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('consumer_id')->default(0);
            $table->integer('area_id')->default(0);
            $table->string('activity_title', 255);
            $table->string('activity_addr', 255);
            $table->integer('start_at')->default(0);
            $table->integer('end_at')->default(0);
            $table->timestamps();
            $table->index(['consumer_id'], 'idx_consumer_id');
            $table->index(['area_id'], 'idx_area_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
