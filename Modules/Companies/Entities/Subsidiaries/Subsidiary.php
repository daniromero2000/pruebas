<?php

namespace Modules\Companies\Entities\Subsidiaries;

use App\Entities\Generals\Cities\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Subsidiary extends Model
{
    use SoftDeletes, SearchableTrait;

    protected $table = 'subsidiaries';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'city_id',
        'parent_id',
        'opening_hours'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
        'city_id',
        'city',
        'employees',
        'opening_hours',
        'relevance'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'deleted_at',
        'updated_at',
        'status'
    ];

    protected $dates  = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected $searchable = [
        'columns' => [
            'subsidiaries.name' => 10,
            'cities.city'       => 10,
        ],
        'joins' => [
            'cities' => ['cities.id', 'subsidiaries.city_id'],
        ],
    ];

    public function searchSubsidiary($term)
    {
        return self::search($term);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
