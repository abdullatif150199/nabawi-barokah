<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentationImg extends Model
{
    protected $fillable = ['documentation_id', 'url'];

    public function documentation()
    {
        return $this->belongsTo(Documentation::class);
    }
}
