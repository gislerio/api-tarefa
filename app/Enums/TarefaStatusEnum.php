<?php

namespace App\Enums;

enum TarefaStatusEnum: string
{
    case Pendente = 'Pendente';
    case Realizado = 'Realizada';
    case Suspensa = 'Suspensa';

}
