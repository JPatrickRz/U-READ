<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_title',
        'abstract',
        'publisher',
        'year',
        'patent_status',
        'department',
        'pdf_file',
        'pdf_file_name',
    ];

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function advisers()
    {
        return $this->hasMany(Adviser::class);
    }

    public function panels()
    {
        return $this->hasMany(Panel::class);
    }
}
