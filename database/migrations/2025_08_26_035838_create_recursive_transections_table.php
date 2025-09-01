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
        Schema::create('recursive_transections', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id');
            $table->integer('type')->comment('1 daily, 2 monthly, 3 yearly');
            $table->date('trans_start_date')->nullable();
            $table->date('trans_finish_date')->nullable();
            $table->decimal('amount',10,2)->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursive_transections');
    }
};
