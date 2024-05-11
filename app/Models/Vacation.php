<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vacation extends Model
{
    use CrudTrait;
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'worker_id',
        'start_date',
        'days'
    ];

    public function worker():BelongsToMany
    {
        return $this->belongsToMany(Worker::class);
    }
}
