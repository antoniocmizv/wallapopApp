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
    Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('buyerId')->nullable();
        $table->string('product');
        $table->text('description');
        $table->decimal('price', 10, 2);
        $table->boolean('isSold')->default(false);
        $table->text('img')->nullable(); 
        $table->timestamps();
    });

    //Creo productos de prueba
    DB::table('sales')->insert([
        'category_id' => 1,
        'user_id' => 1,
        'product' => 'iPhone 11 Pro',
        'description' => 'iPhone 11 Pro 64GB en perfecto estado',
        'price' => 999.99,
        'isSold' => false,
        'img' => 'images/iphone11.jpg',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::table('sales')->insert([
        'category_id' => 2,
        'user_id' => 1,
        'product' => 'MacBook Pro 2019',
        'description' => 'MacBook Pro 2019 con Touch Bar en perfecto estado',
        'price' => 1999.99,
        'isSold' => false,
        'img' => 'images/macbookpro.jpg',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::table('sales')->insert([
        'category_id' => 3,
        'user_id' => 1,
        'product' => 'Apple Watch Series 5',
        'description' => 'Apple Watch Series 5 en perfecto estado',
        'price' => 399.99,
        'isSold' => false,
        'img' => 'images/applewatch.jpg',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::table('sales')->insert([
        'category_id' => 1,
        'user_id' => 1,
        'product' => 'iPad Pro 2020',
        'description' => 'iPad Pro 2020 en perfecto estado',
        'price' => 799.99,
        'isSold' => false,
        'img' => 'images/ipadpro.jpg',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
