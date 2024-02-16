<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $table = 'tasks';

    protected $fillable = [
        'descricao',
    ];

    public function isCompleted(){
        return $this->completed_at !== null;
    }
}
