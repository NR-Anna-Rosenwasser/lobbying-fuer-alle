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
        Schema::create('concerns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean("parlch_checked")->default(false);
            $table->boolean("past_concerns")->default(false);
            $table->boolean("past_concerns_timespan")->nullable();
            $table->text("past_concerns_details")->nullable();
            $table->text("experts")->nullable();
            $table->text("further_information")->nullable();
            $table->foreignId('constituent_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concerns');
    }
};
