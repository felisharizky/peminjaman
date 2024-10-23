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
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas');
            $table->foreignId('pc_id')->constrained('pcs')->onDelete('cascade'); // Menambahkan foreign key ke tabel pcs
            $table->string('kelengkapan')->nullable();
            $table->date('tanggalPinjam');
            $table->date('tanggalKembali')->nullable();
            $table->unsignedBigInteger('user_id'); // Menambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Menambahkan foreign key ke tabel users
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('pinjams');
        Schema::table('pinjams', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Menghapus foreign key
            $table->dropColumn('user_id'); // Menghapus kolom user_id
        });
    }


};

// class AddKonfirmasiColumnToPinjamsTable extends Migration
// {
//     public function up()
//     {
//         Schema::table('pinjams', function (Blueprint $table) {
//             $table->boolean('konfirmasi')->default(false);
//         });
//     }

//     public function down()
//     {
//         Schema::table('pinjams', function (Blueprint $table) {
//             $table->dropColumn('konfirmasi');
//         });
//     }
// };

