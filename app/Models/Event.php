<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\EventType;

/**
 * Classe de modelo para Eventos
 *
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property string|null $description
 * @property EventType $type
 * @property \DateTime $start_date
 * @property \DateTime $end_date
 * @property string $location
 */
class Event extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'type',
        'start_date',
        'end_date',
        'location',
    ];

    protected $casts = [
        'type' => EventType::class,
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}
