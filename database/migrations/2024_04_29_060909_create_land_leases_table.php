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
        Schema::create('land_leases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('dag_list_id');
            $table->foreignId('land_lease_application_id')->nullable();
            $table->date('first_issue_date');
            $table->string('first_issue_session');
            $table->date('last_payment_date')->nullable();
            $table->string('last_payment_session')->nullable();

            $table->foreignId('created_by');

            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('created_by')->on('users')->references('id');
            $table->foreign('dag_list_id')->on('dag_lists')->references('id');
            $table->foreign('land_lease_application_id')->on('land_lease_applications')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_leases');
    }
};
