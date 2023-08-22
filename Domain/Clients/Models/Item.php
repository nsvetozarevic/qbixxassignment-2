<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Item extends Model
{
    use HasFactory;
    use HasTranslations;

    public const TYPE_WISDOM = 'wisdom';
    public const TYPE_PHILOSOPHY = 'philosophy';
    public const TYPE_DESIGN = 'design';
    public const ALLOWED_TYPES = [
        self::TYPE_WISDOM,
        self::TYPE_PHILOSOPHY,
        self::TYPE_DESIGN,
    ];

    public $translatable = [
        'title',
        'paragraph',
    ];

    protected $casts = [
        'title' => 'json',
        'paragraph' => 'json',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
