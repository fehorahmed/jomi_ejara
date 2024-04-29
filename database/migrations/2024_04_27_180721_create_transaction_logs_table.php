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
            $table->enum('transaction_method',  ['BANK', 'BKASH', 'NAGAD', 'CASH']);

            $table->float('amount', 8, 2)->default(0);
            $table->text('payorder')->nullable();
            $table->text('bank')->nullable();
            $table->text('branch')->nullable();
            $table->text('transaction_number')->nullable();
            $table->text('transaction_id')->nullable();
            $table->text('receipt_no')->nullable();

            $table->foreignId('land_lease_application_id');
            $table->foreign('land_lease_application_id')->on('land_lease_applications')->references('id');

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
