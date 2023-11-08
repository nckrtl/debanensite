<?php

namespace Nckrtl\DeBanensite\Enums;

enum EducationLevel: string
{
    case UNIVERSITAIR = 'UNIVERSITAIR';
    case HBO = 'HBO';
    case MBO = 'MBO';
    case LBO = 'LBO';
    case VWO = 'VWO';
    case HAVO = 'HAVO';
    case VMBO_MAVO = 'VMBO / MAVO';

    public function id(): string
    {
        return match ($this) {
            EducationLevel::UNIVERSITAIR => '16254553-e8b4-4d65-8c04-4a955507b403',
            EducationLevel::HBO => '2c04edda-c426-4c88-aa73-51bb8e43acbe',
            EducationLevel::MBO => '33d52bc2-410b-4456-8796-24567d4eccd6',
            EducationLevel::LBO => '48e44a17-f39e-43f2-9f61-1c0173949724',
            EducationLevel::VWO => '512699e1-6f44-4bcf-b0de-faca88b037b4',
            EducationLevel::HAVO => '6fbde86d-8228-4dcc-a84a-11bf108459b5',
            EducationLevel::VMBO_MAVO => '704c7c31-2712-4cfa-ad8d-c454f2212e02',
        };
    }
}
