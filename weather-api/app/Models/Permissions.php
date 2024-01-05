<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;

class Permissions extends Permission
{
    use HasFactory;

    public const NAME_ATTRIBUTE = 'name';

}
