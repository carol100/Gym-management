<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberInformation extends Model
{
    use HasFactory, Uuids, SoftDeletes;
    protected $guarded = [];

    public function getCreatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s');
    }
}
