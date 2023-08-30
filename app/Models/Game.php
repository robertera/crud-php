<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const TABELA_GAMES = 'games';

    public const CAMPO_DELETED_AT = 'deleted_at';
    public const CAMPO_CREATED_AT = 'created_at';
    public const CAMPO_UPDATED_AT = 'updated_at';

    public const CAMPO_ID = 'id';
    public const CAMPO_NAME = 'name';
    public const CAMPO_DESCRIPTION = 'description';
    public const CAMPO_PRICE = 'price';
    public const CAMPO_RELEASE_DATE = 'release_date';
    public const CAMPO_USER_ID = 'user_id';
}
