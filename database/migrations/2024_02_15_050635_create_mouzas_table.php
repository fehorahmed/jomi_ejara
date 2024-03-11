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
        Schema::create('mouzas', function (Blueprint $table) {
            $table->id();
            $table->string('en_name')->nullable();
            $table->string('bn_name');
            $table->string('j_l_no')->nullable();
            $table->foreignId('upazila_id');
            $table->foreignId('union_pourashava_id');
            $table->foreignId('khatian_type_id');
            $table->boolean('status')->default(1);

            $table->foreign('khatian_type_id')->on('khatian_types')->references('id');
            $table->foreign('union_pourashava_id')->on('union_pourashavas')->references('id');
            $table->foreign('upazila_id')->on('upazilas')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouzas');
    }
};
