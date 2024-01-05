<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    use EnumToArray;
    case VIEW_PROFILE = 'view_profile';
    case VIEW_USERS = 'view_users';
    case EDIT_USERS = 'edit_users';
    case VIEW_WEATHER = 'view_weather';
    case EDIT_WEATHER = 'edit_weather';
    case CREATE_WEATHER = 'create_weather';

    public static function admin(): array
    {
        return [
            self::VIEW_PROFILE->value,
            self::VIEW_USERS->value,
            self::EDIT_USERS->value,
            self::VIEW_WEATHER->value,
            self::EDIT_WEATHER->value,
            self::CREATE_WEATHER->value,
        ];
    }

    public static function client(): array
    {
        return [
            self::VIEW_PROFILE->value,
            self::VIEW_WEATHER->value,
        ];
    }
}
