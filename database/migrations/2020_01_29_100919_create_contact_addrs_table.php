<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactAddrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_addrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contact_id')->default(0);
            $table->string('city', 255);
            $table->string('province', 255);
            $table->string('addr', 255);
            $table->timestamps();
            $table->index(['contact_id'], 'idx_contact_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_addrs');
    }
}
