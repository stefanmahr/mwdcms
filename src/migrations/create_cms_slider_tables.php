<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsSliderTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
		Schema::connection(config('cms.database.connection'))->create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cmskey', 30)->unique();
            $table->boolean('enabled');
			$table->boolean('fullwidth');
			$table->integer('interval');
			$table->integer('height');
			$table->boolean('controls');
			$table->boolean('indicators');
            $table->timestamps();
        });
		
		Schema::connection(config('cms.database.connection'))->create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slider_id');
			$table->integer('order');
            $table->string('title');
			$table->string('desc');
			$table->text('images');
            $table->timestamps();
        });
		
		Schema::connection(config('cms.database.connection'))->table('slides', function ($table) {
			$table->foreign('slider_id')->references('id')->on('sliders');
		});
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
		Schema::connection(config('cms.database.connection'))->create('sliders');
		Schema::connection(config('cms.database.connection'))->create('slides');
		
    }
}
