<?php

namespace core\Database\Traits;

use core\Database\DBConnection\DBConnection;


trait HasCRUD{

    protected function setFillabels()
    {
        $fillables = [];
        foreach ($this->fillable as $attribute){
            if(isset($this->attributes)){
                $fillables[] = $attribute . ' = ?';
                $this->setValue($this->attributes, $attribute);
            }
        }

      return  implode(', ',$fillables);
    }


    protected function insert()
    {
        $this->setSql("INSERT INTO {$this->table} SET ". $this->setFillabels() .$this->createdAt. "=Now();");
        $this->executeQuery();
        $this->resetQuery();
    }

    protected function update()
    {
        $this->setSql("INSERT INTO {$this->table} SET ". $this->setFillabels() .$this->updatedAt. "=Now();");
        $this->setWhere("AND ", $this->primaryKey . " = ? ");
        $this->setValue($this->primaryKey, $this->{$this->primaryKey});
        $this->executeQuery();
        $this->resetQuery();
    }

}