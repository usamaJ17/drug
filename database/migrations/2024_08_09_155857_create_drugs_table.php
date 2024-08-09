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
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->date('date_dispensed');
            $table->string('name')->nullable();
            $table->string('ndc')->nullable();
            $table->integer('qty')->default(0);
            $table->string('insurance')->nullable();
            $table->string('bin')->nullable();
            $table->string('primary_ins_pay')->nullable();
            $table->string('customer_group')->nullable();
            $table->float('net_profit')->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugs');
    }
};
