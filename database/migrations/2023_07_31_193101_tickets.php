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
        //
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('ticket_type');
            $table->decimal('ticket_price', 8, 2);
            $table->integer('ticket_quantity');
            $table->date('event_date');
            $table->string('event_location');
            // Add more fields as needed
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tickets');
    }
};
