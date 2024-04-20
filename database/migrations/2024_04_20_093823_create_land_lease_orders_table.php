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
        Schema::create('land_lease_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dag_list_id');
            $table->float('form_fee')->default(0);
            $table->float('application_fee')->default(0);
            $table->date('publish_date');
            $table->date('application_end_date');
            $table->enum('status', ['PUBLISHED', 'APPLIED', 'ACCEPT', 'CANCEL'])->default('PUBLISHED');
            $table->foreignId('created_by');

            $table->foreign('dag_list_id')->on('dag_lists')->references('id');
            $table->foreign('created_by')->on('users')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_lease_orders');
    }
};
