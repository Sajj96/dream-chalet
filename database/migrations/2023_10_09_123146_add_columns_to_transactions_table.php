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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('reference_no')->after('user_id');
            $table->string('payment_reference')->after('reference_no')->nullable();
            $table->string('currency')->after('amount')->nullable();
            $table->string('message')->after('currency')->nullable();
            $table->string('payment_method')->after('message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
