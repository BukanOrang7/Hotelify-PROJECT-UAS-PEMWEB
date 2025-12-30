<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $slug
 * @property string|null $excerpt
 * @property string $body
 * @property string|null $featured_image
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read User $author
 */
class BlogPost extends Model
{
    protected $fillable = [
        'author_id','title','slug','excerpt','body','featured_image','published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function author() { return $this->belongsTo(User::class, 'author_id'); }
}
