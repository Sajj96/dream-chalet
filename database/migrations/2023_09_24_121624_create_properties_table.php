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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->double('price');
            $table->string('currency');
            $table->unsignedBigInteger('house_type_id');
            $table->integer('bedrooms');
            $table->integer('bathrooms')->nullable();
            $table->integer('floors')->default(0);
            $table->integer('roofs')->default(0);
            $table->integer('blocks')->default(0);
            $table->integer('square_meter')->nullable();
            $table->string('thumbnail');
            $table->text('details')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('house_type_id')->references('id')->on('house_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
