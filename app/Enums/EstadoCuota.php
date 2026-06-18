<?php

namespace App\Enums;

enum EstadoCuota: string
{
    case PENDIENTE = 'PENDIENTE';
    case PARCIAL = 'PARCIAL';
    case PAGA = 'PAGA';
    case VENCIDA = 'VENCIDA';
    case ANULADA = 'ANULADA';
}