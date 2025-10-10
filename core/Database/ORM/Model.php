<?php

namespace Core\Database\ORM;

use core\Database\Traits\HasAttributes;
use core\Database\Traits\HasQueryBuilder;
use core\Database\Traits\HasCRUD;

abstract class Model
{
    use HasQueryBuilder, HasAttributes, HasCRUD;

    protected $table;
    protected $fillable = [];
    protected $hidden = [];
    protected $casts = [];
    protected $primaryKey = 'id';
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = null;
    protected $collection = [];
}