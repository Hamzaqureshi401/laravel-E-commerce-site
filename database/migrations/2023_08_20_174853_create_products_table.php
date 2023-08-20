<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
            $table->string('size');
            $table->decimal('price', 10, 2);
            $table->string('image'); // New image column
            $table->timestamps();
        });

        // Insert at least two records
        DB::table('products')->insert([
            [
                'name' => 'Blue denim shirt',
                'color' => 'Blue',
                'size' => 'M',
                'price' => 19.99,
                'image' => 'https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp', // Sample image name
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Red hoodie',
                'color' => 'Red',
                'size' => 'L',
                'price' => 24.99,
                'image' => 'https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.webp', // Sample image name
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
