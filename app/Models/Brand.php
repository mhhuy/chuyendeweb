<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    //
    use SoftDeletes;
    protected $table = 'brand';
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}