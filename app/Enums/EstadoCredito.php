<?php

namespace App\Enums;

enum EstadoCredito: string
{
    case ACTIVO = 'ACTIVO';
    case PENDIENTE = 'PENDIENTE';
    case REFINANCIADO = 'REFINANCIADO';
    case CANCELADO = 'CANCELADO';
    case JUDICIALIZADO = 'JUDICIALIZADO';
}