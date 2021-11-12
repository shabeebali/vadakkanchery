<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $casts = [
        'employed' => 'boolean',
        'phones' => 'array',
        'married' => 'boolean',
        'parent_id' => 'integer',
        'spouse_id' => 'integer',
        'in_law' => 'boolean',
        'male' => 'boolean',
        'alive' => 'boolean'
    ];

    public function parent()
    {
        return $this->belongsTo(Member::class, 'parent_id');
    }

    public function spouse()
    {
        return $this->hasOne(Member::class, 'spouse_id');
    }

    public function children()
    {
        return $this->hasMany(Member::class, 'parent_id');
    }
}
