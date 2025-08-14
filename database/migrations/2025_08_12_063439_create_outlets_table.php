<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Outlet name (can be duplicate)
            $table->string('location')->nullable(); // Address or location
            $table->string('slug')->unique(); // Unique URL-friendly string
            $table->tinyInteger('status')->default(1); // 1 = active, 0 = inactive
            $table->timestamps();
            $table->softDeletes(); // Keep deleted records for history
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};
