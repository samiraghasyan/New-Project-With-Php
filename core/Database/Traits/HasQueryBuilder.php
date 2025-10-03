<?php

namespace core\Database\Traits;

use core\Database\DBConnection\DBConnection;

trait HasQueryBuilder
{
    private string $sql = '';

    public function getSql() : string
    {
        return $this->sql;
    }

    public function setSql(string $sql): string
    {
        return $this->sql = $sql;
    }

    public function resetSql(): void
    {
        $this->sql = '';
    }

}