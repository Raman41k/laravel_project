<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = ['name'];


    public function users():belongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
