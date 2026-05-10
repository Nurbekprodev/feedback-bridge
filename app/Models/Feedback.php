<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'business_id',
        'rating',
        'message',
    ];
    
    protected $table = 'feedbacks';

    public function business(){
        $this->belongsTo(Business::class);
    }
}
