<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function type()
    {
        return $this->belongsTo(Type::class);

    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
    protected $fillable = [
        'types_id',
        'title',
        'description',
        'path_img',
        'url',
    ];
}
