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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('due_date');
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->foreignId('assigned_to')->constrained('users')->onDelete('cascade');
            $table->foreignId('related_contact_id')->nullable()->constrained('contacts')->onDelete('cascade');
            $table->foreignId('related_deal_id')->nullable()->constrained('deals')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
