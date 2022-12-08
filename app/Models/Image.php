<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function couleurs()
    {
        return $this->hasMany(Couleur::class);
    }

    public function visites()
    {
        return $this->hasMany(Visite::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
