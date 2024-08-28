<?php

namespace Database\Seeders;

use App\Models\AccAccount;
use App\Models\Employee;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $admin = User::create([
      'username' => 'admin',
      'email' => 'dhuta@dlabs.id',
      'password' => Hash::make('admin'),
      'email_verified_at' => now(),
      // 'api_token' => Hash::make('demo@demo'),
    ]);
    // $demoUser->assignRole('superadmin');

    $this->addEmployee($admin);
  }

  private function addEmployee(User $user)
  {
    Employee::create([
      'user_id' => $user->id,
      'ktp_nik' => '3525102105930004',
      'ktp_alamat' => 'Malang',
      'email' => 'dhuta@dlabs.id',
      'kar_nik' => '0000',
      'npwp' => '3525102105930004',
      'nama' => 'Dhuta Pratama',
      'tempat_lahir' => 'Gresik',
      'tgl_lahir' => '1993-05-21',
      'no_hp' => '08113244422',
      'jenis_kelamin' => 'L',
      'file_cv' => 'null',
    ]);
  }
}
