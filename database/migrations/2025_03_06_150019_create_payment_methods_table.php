<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method'); // e.g. "PayPal", "Cash", etc.
            $table->unsignedBigInteger('payment_method_type_id'); // foreign key
            $table->timestamps();

            // Create foreign key constraint
            $table->foreign('payment_method_type_id')
                ->references('id')
                ->on('payment_method_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
