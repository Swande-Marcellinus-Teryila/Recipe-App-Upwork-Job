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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->foreignId("recipe_id")->constrained()->onDelete("cascade");
            $table->string("ingredient");
            $table->integer("quantity");
            $table->foreignId("measurement_id")->constrained()->onDelete("cascade");
            $table->integer("small_unit_id")->constrained()->onDelete("cascade");
            $table->string("serving_cost");
            $table->integer("cost");
            $table->integer("package_size");
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
        Schema::dropIfExists('ingredients');
    }
};
