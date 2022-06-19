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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('cholesterol');
            $table->integer('glucose');
            $table->integer('hdl_chol');
            $table->decimal('chol_hdl_ratio', $precision = 4, $scale = 2);
            $table->integer('age');
            $table->string('gender');
            $table->integer('height');
            $table->integer('weight');
            $table->decimal('bmi', $precision = 4, $scale = 2);
            $table->integer('systolic_bp');
            $table->integer('diastolic_bp');
            $table->integer('waist');
            $table->integer('hip');
            $table->decimal('waist_hip_ratio', $precision = 4, $scale = 2);
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
        Schema::dropIfExists('items');
    }
};
