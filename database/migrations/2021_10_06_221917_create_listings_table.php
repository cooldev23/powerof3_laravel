<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('city');
            $table->string('zip', 13);
            $table->string('url')->nullable();
            $table->tinyInteger('bedrooms')->unsigned()->nullable();
            $table->tinyInteger('bathrooms')->unsigned()->nullable();
            $table->string('price')->nullable();
            $table->foreignId('employee_id')->unsigned();
            $table->foreignId('listing_type')->unsigned();
            $table->string('acres', 30)->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('image_path')->nullable();
            $table->string('image_alt', 125)->nullable();
            $table->text('listing_description')->nullable();
            $table->string('video_path')->nullable();
            $table->dateTime('date_sold')->nullable()->default(null);
            $table->string('sold_price')->nullable();
            $table->string('represented')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('listings');
    }
}
