<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile_number', 20);
            $table->string('email')->nullable();
            $table->boolean('terms_accepted')->default(false);

            // Foreign key to outlets table
            $table->foreignId('outlet_id')
                  ->nullable()
                  ->constrained('outlets')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
