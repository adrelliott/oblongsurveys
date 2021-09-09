<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TenantManagementTrait;

class Section extends Model
{
    use HasFactory, TenantManagementTrait;
}
