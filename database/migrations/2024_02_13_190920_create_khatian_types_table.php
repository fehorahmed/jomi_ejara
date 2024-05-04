<?php

use App\Models\KhatianType;
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
        Schema::create('khatian_types', function (Blueprint $table) {
            $table->id();
            $table->string('en_name')->nullable();
            $table->string('bn_name');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        KhatianType::create([
            'en_name' => 'RS',
            'bn_name' => 'আরএস',
            'status' => 0,
        ]);
        KhatianType::create([
            'en_name' => 'CS',
            'bn_name' => 'সিএস',
            'status' => 1,
        ]);
        KhatianType::create([
            'en_name' => 'SA',
            'bn_name' => 'এসএ',
            'status' => 1,
        ]);
        KhatianType::create([
            'en_name' => 'BRS',
            'bn_name' => 'বিআরএস',
            'status' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khatian_types');
    }
};
