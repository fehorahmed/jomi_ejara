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
            $table->string('bnname')->nullable();
            $table->string('nidno')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->string('passportno')->nullable();
            $table->string('birthcertificateno')->nullable();
            $table->string('enfathername')->nullable();
            $table->string('bnfathername')->nullable();
            $table->string('enmothername')->nullable();
            $table->string('bnmothername')->nullable();
            $table->string('enprofession')->nullable();
            $table->string('bnprofession')->nullable();
            $table->string('enprevillage')->nullable();
            $table->string('enpreroad')->nullable();
            $table->string('enprewardno')->nullable();
            $table->string('enprepostoffice')->nullable();
            $table->string('enpreupazilla')->nullable();
            $table->string('enpredistrict')->nullable();
            $table->string('bnprevillage')->nullable();
            $table->string('bnpreroad')->nullable();
            $table->string('bnprewardno')->nullable();
            $table->string('bnprepostoffice')->nullable();
            $table->string('bnpreupazilla')->nullable();
            $table->string('bnpredistrict')->nullable();
            $table->string('enparvillage')->nullable();
            $table->string('enparroad')->nullable();
            $table->string('enparwardno')->nullable();
            $table->string('enparpostoffice')->nullable();
            $table->string('enparupazilla')->nullable();
            $table->string('enpardistrict')->nullable();
            $table->string('bnparvillage')->nullable();
            $table->string('bnparroad')->nullable();
            $table->string('bnparwardno')->nullable();
            $table->string('bnparpostoffice')->nullable();
            $table->string('bnparupazilla')->nullable();
            $table->string('bnpardistrict')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('marital_status')->nullable();
            $table->unsignedTinyInteger('religion')->nullable()->comment('1=Islam, 2=Hindu, 3=Khristian, 4=Boddho');
            $table->boolean('is_admin')->nullable()->comment('1=admin');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->rememberToken();
            $table->unsignedTinyInteger('role')->nullable();
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
