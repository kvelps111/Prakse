<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->text('message');
            $table->string('option');
            $table->string('priority');
            $table->string('status')->default('New');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
