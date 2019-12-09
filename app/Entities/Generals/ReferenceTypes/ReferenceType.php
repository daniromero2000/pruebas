<?php

namespace App\Entities\Generals\ReferenceTypes;

use App\Entities\Generals\Relationships\Relationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferenceType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'reference_type'
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

    public function relationships()
    {
        return $this->hasMany(Relationship::class);
    }
}
