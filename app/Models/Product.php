<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'code', 'name', 'description', 'active', 'price'
    ];

    protected $casts = [
        'active' => 'boolean', 'price' => 'decimal:2'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];
}
