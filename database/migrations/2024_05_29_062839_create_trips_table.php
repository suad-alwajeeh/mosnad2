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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('day');
            $table->string('time');
            $table->double('price');
            $table->string('period');
            $table->time('start_at');
            $table->enum('status',["pending","completed","inprogress"]);
            $table->foreignId('trip_official')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('bus_id')->nullable()->constrained('buses')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('trip_type_id')->nullable()->constrained('trip_types')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('from_city_id')->nullable()->constrained('cities')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('to_city_id')->nullable()->constrained('cities')->nullOnDelete()->cascadeOnUpdate();
             $table->text('note');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
