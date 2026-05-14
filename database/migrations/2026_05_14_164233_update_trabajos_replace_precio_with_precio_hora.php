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
        Schema::table('trabajos', function (Blueprint $table) {
            $table->renameColumn('precio', 'precio_hora');
        });

        Schema::table('trabajos', function (Blueprint $table) {
            $table->dropColumn('horas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trabajos', function (Blueprint $table) {
            $table->renameColumn('precio_hora', 'precio');
        });

        Schema::table('trabajos', function (Blueprint $table) {
            $table->decimal('horas', 5, 2)->default(0);
        });
    }
};
