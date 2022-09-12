<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public $sortable = ['name', 'parent_id', 'position'];
}
