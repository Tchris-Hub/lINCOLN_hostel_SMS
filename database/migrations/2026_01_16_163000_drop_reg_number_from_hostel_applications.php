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
            // SQLite may fail dropping indexed legacy columns depending on schema state.
            return;
        }

        Schema::table('hostel_applications', function (Blueprint $table) {
            if (Schema::hasColumn('hostel_applications', 'reg_number')) {
                $table->dropColumn('reg_number');
            }
        });
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            return;
        }

        Schema::table('hostel_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('hostel_applications', 'reg_number')) {
                $table->string('reg_number')->nullable();
            }
        });
    }
};
