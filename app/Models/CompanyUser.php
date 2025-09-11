<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Classe de modelo para Usuários de Empresa
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $email
 * @property string $password
 *
 * @property-read Company $company
 */
class CompanyUser extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Empresa vinculada ao usuário
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
