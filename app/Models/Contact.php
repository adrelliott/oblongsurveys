<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TenantManagementTrait;

class Contact extends Model
{
    use HasFactory, TenantManagementTrait;

    protected $fillable = ['first_name', 'email', 'client_id'];

    // /**
    //  * The "booted" method of the model.
    //  *
    //  * @return void
    //  */
    // protected static function booted()
    // {
    //     static::addGlobalScope(new ConstrainByTenantId);
    // }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->hasOneThrough(User::class, Client::class);
    }

}
