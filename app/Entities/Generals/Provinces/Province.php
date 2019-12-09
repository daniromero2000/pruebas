<?php

namespace App\Entities\Generals\Provinces;

use App\Entities\Generals\Cities\City;
use App\Entities\Generals\Countries\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;

    protected $table = 'provinces';

    protected $fillable = [
        'name',
        'country_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'deleted_at',
        'updated_at',
        'status'
    ];

    protected $hidden = [];

    protected $dates  = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class)->orderBy('city', 'asc');
    }
}
