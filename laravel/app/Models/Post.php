<?php

namespace App\Models;

use App\Interfaces\SortableModelInterface;
use App\Services\TimestampsFormatter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Post
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property DateTimeInterface $created_at
 * @property DateTimeInterface $updated_at
 * @property User $user
 * @package App\Models
 */
class Post extends Model implements SortableModelInterface
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    /**
     * @return array
     */
    public function toArray(): array
    {
        return TimestampsFormatter::format(
            parent::toArray()
        );
    }

    /**
     * @return BelongsTo|User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return string[]
     */
    public function getSortableFields(): array
    {
        return [
            'id',
            'user_id',
            'title',
            'content',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * @return string
     */
    public function getDefaultSortField(): string
    {
        return $this->getKeyName();
    }
}
