<?php

namespace App\Entities\Generals\Relationships;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Customers\Entities\CustomerReferences\CustomerReference;
use App\Entities\Generals\ReferenceTypes\ReferenceType;

class Relationship extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'relationship'
    ];

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

    public function customerReferences()
    {
        $this->hasMany(CustomerReference::class);
    }

    public function referenceType()
    {
        return $this->belongsTo(ReferenceType::class);
    }
}
