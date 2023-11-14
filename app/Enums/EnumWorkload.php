<?php
namespace App\Enums;

use App\Traits\EnumTrait;

enum EnumWorkload: string
{
    use EnumTrait;

    case THIRTY_SIX = 'thirty_six';
    case SEVENTY_TWO = 'seventy_two';

    public function description():string {
        return match($this){
            EnumWorkload::THIRTY_SIX => '36h',
            EnumWorkload::SEVENTY_TWO => '72h',
            default => throw new \Exception('enum unsupported')
        };
    }
}
