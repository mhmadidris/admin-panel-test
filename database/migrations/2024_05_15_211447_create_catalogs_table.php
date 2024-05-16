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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->binary('image');
            $table->string('name');
            $table->enum('status', ['bagus', 'rusak', 'perlu_perbaikan', 'dalam_perbaikan']);
            $table->uuid('brand_id');
            $table->uuid('category_id');
            $table->uuid('unit_id');
            $table->timestamps();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
