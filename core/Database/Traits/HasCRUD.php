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
                $this->setValues($this->attributes, $attribute);
            }
        }

      return  implode(', ',$fillables);
    }


    protected function insert()
    {
        $this->setSql("INSERT INTO {$this->table} SET ". $this->setFillabels() .$this->createdAt. "=Now();");
        $this->executeQuery();
        $this->resetQuery();
        $object = $this->find(DBConnection::newInsertedID());
        $defaultVariables = get_class_vars(get_called_class());
        $all_variables = get_object_vars($object);
        $different = array_diff(array_keys($all_variables),array_keys($defaultVariables));
        foreach ($different as $attributes){
            $this->$attributes = $object->$attributes;
        }
        $this->resetQuery();
        return $this;

    }

    protected function update()
    {
        $this->setSql("INSERT INTO {$this->table} SET ". $this->setFillabels() .$this->updatedAt. "=Now();");
        $this->setWhere("AND ", $this->primaryKey . " = ? ");
        $this->setValues($this->primaryKey, $this->{$this->primaryKey});
        $this->executeQuery();
        $this->resetQuery();
    }
    
    protected function find($id){
        $this->setSql("SELECET * FROM ".$this->table);
        $this->setWhere("AND",$this->primaryKey . " =? ");
        $this->setValues($this->primaryKey, $id);
        $statement  = $this->executeQuery();
        $data = $statement->fetch();
        if($data){
            return $this->setAttributes($data);
        }else{
            return null;
        }

    }

    protected function get(){
        $this->setSql("SELECT * FROM ".$this->table);
        $statment = $this->executeQuery();
        $data = $statment->fetchAll();
        if($data){
            $this->setObject($data);
            return $this->collection;
        }else{
            return [];
        }

    }

    protected function delete($id){
         $object = $this;
         $this->resetQuery();
         if($id){
             $object = $this->find($id);
             $this->resetQuery();
         }
        $this->setSql("DELETE FROM ".$this->table);
         $object->setWhere("AND",$this->primaryKey . " = ?");
         $this->setValues($this->primaryKey,$object->{$object->primaryKey});
         $this->executeQuery();
         return $object->execute();

    }
    
    protected function where($attribute, $operation, $value)
    {
        $condition = $attribute . ' ' . $operation . ' ? ' ;
        $this->setValues($attribute, $value);
        $operator = " AND ";
        $this->setWhere($operator,$condition);
        return $this;
    }

    protected function orderBy($attribute, $expression){
        $this->setOrderBy($attribute,$expression);
        return $this;
    }

    protected function limit($offset, $number){
        $this->setLimit($offset,$number);
        return $this;
    }
}