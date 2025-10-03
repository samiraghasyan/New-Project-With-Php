<?php

namespace core\Database\Traits;

use core\Database\DBConnection\DBConnection;

trait HasQueryBuilder
{
    private string $sql = '';
    private $where = [];
    private $orderBy = [];
    private $limit = [];
    private $values = [];
    private $bindingValues = [];

    protected function getSql(): string
    {
        return $this->sql;
    }

    protected function setSql(string $sql): string
    {
        return $this->sql = $sql;
    }

    protected function resetSql(): void
    {
        $this->sql = '';
    }

    protected function setWhere($operator, $conditon): void
    {
        $q = ['operator' => $operator, 'conditon' => $conditon];
        $this->where[] = $q;
    }

    protected function resetWhere(): void
    {
        $this->where = [];
    }

    protected function setOrderBy($key, $expersion): void
    {
        $this->orderBy[] = $key.' '.$expersion;

    }

    protected function resetOrderBy(): void
    {
        $this->orderBy = [];
    }

    protected function setLimit($from, $num): void
    {
         $this->limit['from'] = (int) $from;
         $this->limit['num'] = (int) $num;
    }

    protected function resetLimit(): void
    {
         unset($this->limit['from']);
         unset($this->limit['num']);
    }

    protected function setValues($attribute, $value): void
    {
        $this->values[$attribute] = $value;
        $this->bindingValues[] = $value;
    }

    protected function resetValues(): void
    {
        $this->values = [];
        $this->bindingValues = [];
    }

    protected function resetQuery()
    {
        $this->resetSql();
        $this->resetWhere();
        $this->resetValues();
        $this->resetLimit();
        $this->resetOrderBy();
    }

}