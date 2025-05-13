<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('table_id')->constrained('tables')->onDelete('cascade');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->integer('guests');
            $table->string('status')->default('pending'); // pending, confirmed, canceled
            $table->timestamps();
        });
    }

    public function down(): void
    {   
        Schema::dropIfExists('reservations');
    }
};
