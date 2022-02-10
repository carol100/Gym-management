<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class MemberInformation extends Model
{
    use HasFactory, Uuids, SoftDeletes;
    protected $guarded = [];

    public function getCreatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s');
    }

    public function member(){
        $this->belongsTo(Member::class);
    }
}
