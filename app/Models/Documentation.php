<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(DocumentationImg::class);
    }
}
