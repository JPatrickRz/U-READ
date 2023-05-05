<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    use HasFactory;

    protected $fillable = [
        'publication_id',
        'panel_position',
        'panel_first_name',
        'panel_mi_middle',
        'panel_last_name',
        'panel_suffix',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
