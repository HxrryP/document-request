<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to users table
            $table->string('permit_type'); // 'new', 'renewal', 'change_info'
            $table->string('business_name');
            $table->text('business_address');
            $table->string('owner_name');
            // Add other permit-specific fields as needed
            $table->string('status')->default('pending'); // pending, processing, approved, rejected, released
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permits');
    }
};
