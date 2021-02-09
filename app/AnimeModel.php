<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeModel extends Model
{
    protected $table = 'anime';

    protected $primaryKey = 'kode_anime';
}
