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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('type');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->string('street');
            $table->string('ward');
            $table->string('city');
            $table->string('country');
            $table->text('description')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('delivery_method')->nullable();
            $table->double('amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
