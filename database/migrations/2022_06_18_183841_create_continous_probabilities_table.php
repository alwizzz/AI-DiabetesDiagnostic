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
        Schema::create('continous_probabilities', function (Blueprint $table) {
            $table->id();            
            $table->string('attribute');
            $table->double('average');
            $table->double('standard_deviation');
            $table->boolean('diabetes');
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
        Schema::dropIfExists('continous_probabilities');
    }
};
