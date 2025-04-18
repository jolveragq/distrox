<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->enum('party_type', ['client','supplier','both']);
            $table->string('document_type_code', 2);
            $table->string('ruc', 11)->unique();
            $table->string('name');
            $table->string('commercial_name')->nullable();
            $table->string('fiscal_address');
            $table->string('ubigeo_code', 6)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
