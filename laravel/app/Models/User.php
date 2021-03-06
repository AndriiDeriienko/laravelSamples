<?php

/** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use App\Interfaces\SortableModelInterface;
use App\Services\TimestampsFormatter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property DateTimeInterface $created_at
 * @property DateTimeInterface updated_at
 * @property Post $post
 * @package App\Models
 */
class User extends Authenticatable implements SortableModelInterface
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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
     * @return string[]
     */
    public function getSortableFields(): array
    {
        return [
            'id',
            'name',
            'email',
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

    /**
     * @return HasMany|Collection|Post[]
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
