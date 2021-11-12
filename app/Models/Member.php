<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Member::class, 'parent_id');
    }

    public function spouse()
    {
        return $this->hasOne(Member::class, 'spouse_id');
    }
}
