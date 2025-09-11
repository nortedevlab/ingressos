<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Classe de modelo para Taxas de Serviço
 *
 * @property int $id
 * @property int|null $company_id
 * @property int|null $event_id
 * @property int|null $batch_id
 * @property float|null $fee_percent
 * @property float|null $fee_value
 */
class ServiceFee extends Model
{
    protected $fillable = [
        'company_id',
        'event_id',
        'batch_id',
        'fee_percent',
        'fee_value',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class);
    }
}
