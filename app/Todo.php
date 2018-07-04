<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    protected $table = 'todo';

    public function todo_mirror()
    {
        return $this->hasOne(TodoMirror::class);
    }

}
