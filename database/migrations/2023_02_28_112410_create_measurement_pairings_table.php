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
        Schema::create('measurement_pairings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("big_unit_id")->constrained("measurements")->onDelete("cascade");
            $table->foreignId("small_unit_id")->constrained("measurements")->onDelete("cascade");
            $table->integer("per_unit");
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
        Schema::dropIfExists('measurement_pairings');
    }
};
