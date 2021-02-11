<?php

/** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use App\Interfaces\SortableModelInterface;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        $arrayData =  parent::toArray();
        $arrayData['created_at'] = $this->created_at->format(Carbon::DEFAULT_TO_STRING_FORMAT);
        $arrayData['updated_at'] = $this->updated_at->format(Carbon::DEFAULT_TO_STRING_FORMAT);

        return $arrayData;
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
}
