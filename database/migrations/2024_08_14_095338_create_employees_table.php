<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('employees', function (Blueprint $table) {
      $table->id();

      $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();

      $table->string('ktp_nik', 16);
      $table->text('ktp_alamat', 16);
      $table->string('email');

      $table->string('kar_nik', 50)->nullable();

      $table->string('npwp', 16)->nullable();

      $table->string('nama');
      $table->string('tempat_lahir', 100);
      $table->date('tgl_lahir');
      $table->text('alamat_domisili')->nullable();
      $table->string('no_hp', 16);
      $table->string('no_hp_keluarga', 16)->nullable();

      $table->enum('jenis_kelamin', ['L', 'P']);

      $table->text('file_cv')->nullable();
      $table->text('file_ktp')->nullable();
      $table->text('file_npwp')->nullable();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employees');
  }
};
