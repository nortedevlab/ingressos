<?php

namespace App\Enums;

/**
 * Tipo de Evento
 */
enum EventType: string
{
    case STANDING = 'standing'; // Evento em pé
    case SEATED   = 'seated';   // Evento com assentos
}
