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
        Schema::create('pcs', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama PC
            $table->boolean('available')->default(true); // Status ketersediaan PC
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcs');
    }
};

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */

     
//     public function up(): void
//     {
//         Schema::table('pinjams', function (Blueprint $table) {
//             $table->foreignId('pc_id')->constrained('pcs')->onDelete('cascade'); // Menambahkan foreign key ke tabel pcs
//         });

//         Schema::create('pcs', function (Blueprint $table) {
//             $table->id(); // tipe ini adalah unsignedBigInteger secara default
//             $table->string('nama');
//             $table->boolean('available')->default(true); // Status ketersediaan PC
//             $table->timestamps();
//         });
        
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::table('pinjams', function (Blueprint $table) {
//             $table->dropForeign(['pc_id']);
//             $table->dropColumn('pc_id');
//         });
//     }
// };
