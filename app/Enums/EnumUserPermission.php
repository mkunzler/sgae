<?php
namespace App\Enums;

use App\Traits\EnumTrait;

enum EnumUserPermission: string
{
    use EnumTrait;

    case ADMIN = 'admin';
    case TEACHER = 'teacher';
    case TEACHER_AEE = 'teacher_aee';

    public function description():string {
        return match($this){
            EnumUserPermission::ADMIN => 'Administrador',
            EnumUserPermission::TEACHER => 'Professor(a)',
            EnumUserPermission::TEACHER_AEE => 'Professor(a) AEE',
            default => throw new \Exception('enum unsupported')
        };
    }

    public function styleColor():string {
        return match($this){
            EnumUserPermission::ADMIN => 'success',
            EnumUserPermission::TEACHER => 'warning',
            EnumUserPermission::TEACHER_AEE => 'primary',
            default => throw new \Exception('enum unsupported')
        };
    }
}
