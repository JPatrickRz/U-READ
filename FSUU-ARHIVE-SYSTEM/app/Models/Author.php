<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'publication_id',
        'author_position',
        'author_first_name',
        'author_mi_middle',
        'author_last_name',
        'author_suffix',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
