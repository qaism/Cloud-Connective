<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoMirror extends Model
{
    protected $table = 'todo_mirror';

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}
