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
        Schema::create('land_lease_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('dag_list_id');
            $table->string('session')->index();
            $table->foreignId('land_lease_application_id')->nullable();
            $table->float('amount', 8, 2)->default(0);
            $table->float('vat', 8, 2)->default(0);
            $table->float('tax', 8, 2)->default(0);
            $table->float('total_amount', 8, 2)->default(0);
            $table->float('paid_amount', 8, 2)->default(0);
            $table->enum('status', ['PAID', 'DUE', 'PENDING'])->default('DUE');

            $table->foreignId('created_by');
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
        Schema::dropIfExists('land_lease_sessions');
    }
};
