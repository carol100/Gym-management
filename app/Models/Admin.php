<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use Notifiable, HasRoles, Uuids, SoftDeletes;

    protected $guard = 'admin';
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public $incrementing = false;

    public static function where(string $string, $causer_id)
    {
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getCreatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s');
    }
}
