<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class County extends Model
{
    use HasFactory;

    protected $table = "counties";
    protected $fillable = ['name'];

    public $timestamps = false;


    public function Cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
