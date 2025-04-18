<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('parties')->cascadeOnDelete();
            $table->string('document_type');
            $table->string('document_series');
            $table->string('document_number');
            $table->date('issue_date');
            $table->decimal('total_amount', 14, 2);
            $table->string('currency_code', 3);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
