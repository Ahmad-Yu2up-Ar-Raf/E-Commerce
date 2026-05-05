<?php

use App\Enums\PaymentsMethod;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->longText("desciption");
            $table->decimal('price', 20 , 4)->nullable();
            $table->json('thumnail_image');
            $table->json('images');
            $table->string('payment_method' )->default(PaymentsMethod::Transfer->value);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
