<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->default(0);
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('category_id')->unsigned()->default(0);
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->string('title');
            $table->text('body');
            $table->integer('goalamount')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
        });

         Schema::create('campaign_tag', function (Blueprint $table) {
            
            $table->integer('campaign_id')
                ->references('id')->on('campaigns')
                ->onDelete('cascade');

            $table->integer('tag_id')
                ->references('id')->on('tags')
                ->onDelete('cascade');

            $table->primary(['campaign_id','tag_id']);
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
        Schema::dropIfExists('campaign_tag');
    }
}
