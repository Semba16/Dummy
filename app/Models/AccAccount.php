<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccAccount extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'parent_id',
    'type',
    'name',
    'description',
    'code',
    'placeholder',
    'balance'
  ];

  protected $casts = [
    'placeholder' => 'boolean'
  ];

  /**
   * Get all of the childs for the AccAccount
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function childs(): HasMany
  {
    return $this->hasMany(AccAccount::class, 'parent_id', 'id');
  }
}
