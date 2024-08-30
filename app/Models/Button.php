<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    use HasFactory;

    protected $table = 'buttons';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'color',
        'hyperlink',
        'owner_id',
    ];

    public $timestamps = true;
    //Users id
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
