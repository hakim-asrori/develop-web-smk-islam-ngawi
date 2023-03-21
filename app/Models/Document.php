<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Document extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'documentable_id',
        'documentable_type',
        'document_path',
        'document_name',
        'is_thumbnail',
    ];

    protected $hidden = [
        'id',
        'documentable_id',
        'documentable_type',
    ];

    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }
}
