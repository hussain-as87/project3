<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $attributes = [
        'active' => '1',
    ];

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function registereds()
    {
        return $this->hasMany(Registered::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*for return to customercontroller the case */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    /*active column in show view*/
    public function getActiveAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions()
    {
        return [
            '0' => 'inactive',
            '1' => 'active',

        ];
    }

    public function path_show()
    {

        return url("course/{$this->id}-" . Str::slug($this->name));
    }

}
