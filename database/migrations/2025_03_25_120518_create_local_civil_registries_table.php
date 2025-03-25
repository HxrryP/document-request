<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('local_civil_registries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('certificate_type'); // 'birth', 'marriage', 'death'
            $table->string('requestor_name');
            $table->date('date_of_birth')->nullable(); // Or date_of_marriage, date_of_death, as appropriate
            // Add other LCR-specific fields (e.g., place of birth, names of parents)
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_civil_registries');
    }
};
