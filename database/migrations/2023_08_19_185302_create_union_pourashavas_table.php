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
        Schema::create('union_pourashavas', function (Blueprint $table) {
            $table->id();
            $table->string('en_name')->nullable();
            $table->string('bn_name');
            $table->foreignId('upazila_id');
            $table->boolean('is_pourashava')->default(0);
            $table->boolean('status')->default(1);
            $table->foreign('upazila_id')->on('upazilas')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('union_pourashavas');
    }
};
