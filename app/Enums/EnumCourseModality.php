<?php
namespace App\Enums;

use App\Traits\EnumTrait;

enum EnumCourseModality: string
{
    use EnumTrait;

    case BACHELOR = 'bachelor';
    case GRADUATION = 'graduation';
    case TECHNOLOGIST = 'technologist';

    public function description():string {
        return match($this){
            EnumCourseModality::BACHELOR => 'Bacharelado',
            EnumCourseModality::GRADUATION => 'Licenciatura',
            EnumCourseModality::TECHNOLOGIST => 'Tecnólogo',
            default => throw new \Exception('enum unsupported')
        };
    }
}
