<?php

namespace App\Enums;

enum RolCredito: string
{
    case TITULAR = 'TITULAR';
    case COTITULAR = 'COTITULAR';
    case REPRESENTANTE = 'REPRESENTANTE';
}