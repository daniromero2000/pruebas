<?php

namespace App\Entities\Generals\Countries;

use App\Entities\Generals\Provinces\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $table = 'countries';

    protected $fillable = [
        'name',
        'iso',
        'iso3',
        'numcode',
        'phonecode',
        'status'
    ];

    protected $dates  = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [];

    protected $guarded = [
        'id',
        'created_at',
        'deleted_at',
        'updated_at',
        'status'
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class)->orderBy('province', 'asc');
    }
}
