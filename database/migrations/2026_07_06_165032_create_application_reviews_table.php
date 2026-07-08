<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('application_reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')
                ->references('APL_ID')
                ->on('applications')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->references('id')
                ->cascadeOnDelete();

            $table->string('status');
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_reviews');
    }
};
