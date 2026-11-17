<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('cnic', 13)->change();
        });
    }

    public function down(): void
    {
        // CNIC ko integer mein convert nahi karna,
        // kyun ke 13-digit values INT mein fit nahi hotin.
    }
};