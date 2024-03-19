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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nidno')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('emergency_phone')->nullable();
            $table->string('passportno')->nullable();
            $table->string('birthcertificateno')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('profession')->nullable();
            $table->foreignId('permanent_division')->nullable();
            $table->foreignId('permanent_district')->nullable();
            $table->foreignId('permanent_upazila')->nullable();
            $table->string('permanent_postoffice')->nullable();
            $table->string('permanent_village')->nullable();
            $table->string('permanent_address')->nullable();
            $table->foreignId('present_division')->nullable();
            $table->foreignId('present_district')->nullable();
            $table->foreignId('present_upazila')->nullable();
            $table->string('present_postoffice')->nullable();
            $table->string('present_village')->nullable();
            $table->string('present_address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status', 100)->nullable();
            $table->unsignedTinyInteger('religion')->nullable()->comment('1=Islam, 2=Hindu, 3=Khristian, 4=Boddho,5 =Others');
            $table->boolean('is_admin')->nullable()->comment('1=admin');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->rememberToken();
            $table->unsignedTinyInteger('role')->nullable();
            $table->unsignedTinyInteger('freedomfighters')->nullable()->comment('1=Yes,0=No');
            $table->foreignId('created_by')->nullable();
            $table->foreign('created_by')->on('users')->references('id');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
