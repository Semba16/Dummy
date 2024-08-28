<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'ktp_nik',
    'ktp_alamat',
    'email',
    'kar_nik',
    'npwp',
    'nama',
    'tempat_lahir',
    'tgl_lahir',
    'alamat_domisili',
    'no_hp',
    'no_hp_keluarga',
    'jenis_kelamin',
    'file_cv',
    'file_ktp',
    'file_npwp',
  ];
}
