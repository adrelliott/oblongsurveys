<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Scopes\ConstrainByTenantId;

trait TenantManagementTrait
{
	// include the boot method that contains the scope
	protected static function booted()
    {
        // Don't apply to seeding!
        if (Auth::check()) {
            static::addGlobalScope(new ConstrainByTenantId);

            static::creating(function ($model) {
                $model->tenant_id = Auth::user()->tenant_id;
            });
        }
    }

 //    public function setTenantIdAttribute($value)
 //    {
 //         // Don't apply to seeding!
 //        if (Auth::check()) {
 //            $this->attributes['tenant_id'] = Auth::user()->tenant_id;
 //        }
 //    }
}
