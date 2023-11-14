<?php
namespace App\Enums;

use App\Traits\EnumTrait;

enum EnumSituation: string
{
    use EnumTrait;

    case APROVATED = 'aprovated';
    case MATRICULATED = 'matriculated';
    case REPROVATED = 'reprovated';

    public function description():string {
        return match($this){
            EnumSituation::APROVATED => 'Aprovado',
            EnumSituation::MATRICULATED => 'Matriculado',
            EnumSituation::REPROVATED => 'Reprovado',
            default => throw new \Exception('enum unsupported')
        };
    }
}
