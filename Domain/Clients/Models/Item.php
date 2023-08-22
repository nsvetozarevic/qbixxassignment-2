<?php

namespace Domain\Clients\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    const TYPE_WISDOM = 'wisdom';
    const TYPE_PHILOSOPHY = 'philosophy';
    const TYPE_DESIGN = 'design';
    const ALLOWED_TYPES = [
        self::TYPE_WISDOM,
        self::TYPE_PHILOSOPHY,
        self::TYPE_DESIGN,
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
