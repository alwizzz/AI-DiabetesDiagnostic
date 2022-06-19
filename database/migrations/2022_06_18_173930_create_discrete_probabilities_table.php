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
        Schema::create('discrete_probabilities', function (Blueprint $table) {
            $table->id();
            $table->string('attribute');
            $table->string('value');
            $table->boolean('diabetes');
            $table->double('probability');
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
        Schema::dropIfExists('discrete_probabilities');
    }
};
