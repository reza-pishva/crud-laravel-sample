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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('Firstname',15);
            $table->string('Lastname',20);
            $table->date('DateOfBirth');
            $table->char('PhoneNumber',10);
            $table->string('Email',30);
            $table->string('BankAccountNumber',20);
            $table->timestamps();
            $table->unique(['Firstname','Lastname','DateOfBirth']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
