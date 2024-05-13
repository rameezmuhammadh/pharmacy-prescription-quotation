<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];


    public function prescriptions(): BelongsTo
    {
        return $this->belongsTo(Prescription::class);
    }
}
