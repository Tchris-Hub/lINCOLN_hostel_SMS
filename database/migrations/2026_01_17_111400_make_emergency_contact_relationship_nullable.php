<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            return;
        }

        Schema::table('hostel_applications', function (Blueprint $table) {
            $table->string('emergency_contact_relationship')->nullable()->change();
        });
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            return;
        }

        Schema::table('hostel_applications', function (Blueprint $table) {
            $table->string('emergency_contact_relationship')->nullable(false)->change();
        });
    }
};
