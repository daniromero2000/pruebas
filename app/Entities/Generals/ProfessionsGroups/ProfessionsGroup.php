<?php

namespace App\Entities\Generals\ProfessionsGroups;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Entities\Generals\ProfessionsLists\ProfessionsList;
use Modules\Customers\Entities\CustomerEconomicActivities\CustomerEconomicActivity;

class ProfessionsGroup extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ciuo',
        'professions_group'
    ];

    protected $hidden = [];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
        'status'
    ];

    protected $dates  = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function professionsLists()
    {
        $this->hasMany(ProfessionsList::class);
    }
}
