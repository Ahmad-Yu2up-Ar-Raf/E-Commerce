<?php

use App\Enums\OrderStatus;
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
        Schema::create('orders__updates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->string('status')->default(OrderStatus::Packing->value) ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders__updates');
    }
};
