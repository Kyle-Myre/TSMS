<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();

            $table->string('description');
            $table->unsignedBigInteger('chip_id')->index();
            $table->unsignedBigInteger('staff_id')->index();
            $table->foreign('chip_id')->references('id')->on('chips');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->date('date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
