<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Park extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /** Relations */
    public function statuses()
    {
        return $this->morphOne(Status::class, 'statusable');
    }
}
