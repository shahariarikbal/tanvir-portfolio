<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->date('dob')->nullable();
            $table->string('freelance')->nullable();
            $table->string('fb_ads');
            $table->string('google_ads');
            $table->string('shopify');
            $table->string('dropshipping');
            $table->string('google_shopping');
            $table->string('marketing_strategy');
            $table->string('image');
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
        Schema::dropIfExists('abouts');
    }
}
