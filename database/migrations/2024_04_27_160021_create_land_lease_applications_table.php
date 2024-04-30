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
        Schema::create('land_lease_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dag_list_id');
            $table->foreignId('land_lease_order_id');
            $table->foreignId('user_id');
            $table->date('date');
            $table->date('payment_date');
            $table->float('amount', 8, 2)->default(0);
            $table->enum('payment_method', ['BANK', 'BKASH', 'NAGAD', 'CASH']);
            $table->text('payorder')->nullable();
            $table->text('bank')->nullable();
            $table->text('branch')->nullable();
            $table->text('transaction_number')->nullable();
            $table->text('transaction_id')->nullable();
            $table->text('receipt_no')->nullable();
            $table->enum('status', ['APPLIED', 'ACCEPT', 'CANCEL'])->default('APPLIED');
            $table->foreignId('accept_by')->nullable();

            $table->foreign('dag_list_id')->on('dag_lists')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('accept_by')->on('users')->references('id');
            $table->foreign('land_lease_order_id')->on('land_lease_orders')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_lease_applications');
    }
};
