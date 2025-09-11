<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Classe de modelo para Configuração de Gateways de Pagamento
 *
 * @property int $id
 * @property int|null $company_id
 * @property string $name
 * @property string $provider
 * @property array $config
 * @property bool $is_default
 *
 * @property-read Company|null $company
 */
class PaymentGateway extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'provider',
        'config',
        'is_default',
    ];

    protected $casts = [
        'config' => 'array',
        'is_default' => 'boolean',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
