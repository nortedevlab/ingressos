<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Classe de modelo para Empresas
 *
 * @property int $id
 * @property string $name
 * @property string|null $document
 * @property string|null $email
 * @property string|null $phone
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, CompanyUser> $users
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Event> $events
 */
class Company extends Model
{
    protected $fillable = [
        'name',
        'document',
        'email',
        'phone',
    ];

    /**
     * Retorna os usuários vinculados à empresa
     */
    public function users(): HasMany
    {
        return $this->hasMany(CompanyUser::class);
    }

    /**
     * Retorna os eventos da empresa
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
