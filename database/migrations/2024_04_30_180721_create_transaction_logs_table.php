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
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('transaction_type', ['INCOME', 'EXPENSE']);
            $table->enum('payment_method',  ['BANK', 'BKASH', 'NAGAD', 'CASH']);

            $table->float('amount', 8, 2)->default(0);
            $table->string('payorder')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_no')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('receipt_no')->nullable();
            $table->enum('status', ['PENDING', 'CONFIRM'])->default('PENDING');

            $table->foreignId('land_lease_application_id')->nullable();

            $table->foreignId('land_lease_session_id')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('accept_by')->nullable();
            $table->foreign('land_lease_application_id')->on('land_lease_applications')->references('id');
            $table->foreign('land_lease_session_id')->on('land_lease_sessions')->references('id');
            $table->foreign('created_by')->on('users')->references('id');
            $table->foreign('accept_by')->on('users')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_logs');
    }
};
