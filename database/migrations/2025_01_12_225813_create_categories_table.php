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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Creo las categorías por defecto
        DB::table('categories')->insert([
            ['name' => 'Electrónica', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Muebles', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Coches', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Deporte', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hogar', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tecnología', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Moda', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Juguetes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Libros', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Otros', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
