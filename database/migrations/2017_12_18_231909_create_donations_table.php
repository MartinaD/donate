<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('comment');
            $table->integer('campaign_id')->unsigned()->default(0);
            $table->foreign('campaign_id')
                ->references('id')->on('campaigns')
                ->onDelete('cascade');
            $table->integer('sum')->default(0);
            $table->string('email');
            $table->string('card_num');
            $table->boolean('private')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
