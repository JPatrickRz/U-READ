<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    use HasFactory;

    protected $fillable = [
        'publication_id',
        'adviser_position',
        'adviser_first_name',
        'adviser_mi_middle',
        'adviser_last_name',
        'adviser_suffix',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
