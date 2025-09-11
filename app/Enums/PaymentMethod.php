<?php

namespace App\Enums;

/**
 * Métodos de Pagamento
 */
enum PaymentMethod: string
{
    case CREDIT_CARD = 'credit_card';
    case PIX         = 'pix';
    case BOLETO      = 'boleto';
    case CASH        = 'cash';
    case COURTESY    = 'courtesy';
}
