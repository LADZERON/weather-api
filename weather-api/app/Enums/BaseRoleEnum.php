<?php

namespace App\Enums;

enum BaseRoleEnum: string
{
    use EnumToArray;

    case ADMIN = 'admin';
    case CLIENT = 'client';
}
