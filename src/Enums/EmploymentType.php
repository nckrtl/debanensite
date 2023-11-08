<?php

namespace Nckrtl\DeBanensite\Enums;

enum EmploymentType: string
{
    case FULL_TIME = 'FULL_TIME';
    case PART_TIME = 'PART_TIME';

    public function id(): string
    {
        return match ($this) {
            EmploymentType::FULL_TIME => '63ed00c1-2b1f-4083-a003-6366adc7ce65',
            EmploymentType::PART_TIME => 'd5b6dfc7-42e5-472e-b5de-c35cd7def4d9',
        };
    }
}
