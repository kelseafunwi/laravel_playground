<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courseable', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->default(1);
            $table->bigInteger('courseable_id');
            $table->string('courseable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courseable');
    }
};
