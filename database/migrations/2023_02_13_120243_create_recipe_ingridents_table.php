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
        Schema::create('recipe_ingridents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ingredient_id')->constrained()->onDelete('cascade');
            $table->integer("major_cost");
            $table->foreignId("major_measurement_id")->constrained("me")
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->integer("quantity");
            $table->foreignId("measurement_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('recipe_ingridents');
    }
};
