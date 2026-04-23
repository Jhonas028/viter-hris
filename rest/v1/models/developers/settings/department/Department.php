<?php

class Department
{
    public $department_aid;
    public $department_is_active;
    public $department_name;
    public $department_created;
    public $department_updated;

    public $connection;
    public $start;
    public $total;
    public $search;
    public $lastInsertedId;

    public $tblSettingsDepartment;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblSettingsDepartment = "settings_department";
    }

    public function create()
    {
        try {
            $sql = "insert into {$this->tblSettingsDepartment}";
            $sql .= " ( ";
            $sql .= " department_is_active, ";
            $sql .= " department_name, ";
            $sql .= " department_created, ";
            $sql .= " department_updated ";
            $sql .= ") values (";
            $sql .= " :department_is_active, ";
            $sql .= " :department_name, ";
            $sql .= " :department_created, ";
            $sql .= " :department_updated ";
            $sql .= " ) ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "department_is_active" => $this->department_is_active,
                "department_name" => $this->department_name,
                "department_created" => $this->department_created,
                "department_updated" => $this->department_updated,
            ]);
            $this->lastInsertedId = $this->connection->lastInsertId();
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function readAll()
    {
        try {
            $sql = "select * from {$this->tblSettingsDepartment} ";
            $sql .= " where 1=1 ";
            $sql .= $this->department_is_active != '' ? " and department_is_active = :department_is_active " : " ";
            $sql .= $this->search != '' ? " and ( " : " ";
            $sql .= $this->search != '' ? " department_name like :department_name " : " ";
            $sql .= $this->search != '' ? " ) " : " ";
            $query = $this->connection->prepare($sql);
            $params = array_merge(
                $this->department_is_active != '' ? ["department_is_active" => $this->department_is_active] : [],
                $this->search != '' ? [
                    "department_name" => "%{$this->search}%",
                ] : []
            );
            $query->execute($params);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function readLimit()
    {
        try {
            $sql = "select * from {$this->tblSettingsDepartment} ";
            $sql .= " where 1=1 ";
            $sql .= $this->department_is_active != '' ? " and department_is_active = :department_is_active " : " ";
            $sql .= $this->search != '' ? " and ( " : " ";
            $sql .= $this->search != '' ? " department_name like :department_name " : " ";
            $sql .= $this->search != '' ? " ) " : " ";
            $sql .= " limit :start, :total ";
            $query = $this->connection->prepare($sql);
            $params = array_merge(
                $this->department_is_active != '' ? ["department_is_active" => $this->department_is_active] : [],
                $this->search != '' ? [
                    "department_name" => "%{$this->search}%",
                ] : [],
                [
                    "start" => $this->start - 1,
                    "total" => $this->total,
                ]
            );
            $query->execute($params);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function update()
    {
        try {
            $sql = "update {$this->tblSettingsDepartment} set ";
            $sql .= "department_name = :department_name, ";
            $sql .= "department_updated = :department_updated ";
            $sql .= "where department_aid = :department_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "department_name" => $this->department_name,
                "department_updated" => $this->department_updated,
                "department_aid" => $this->department_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function active()
    {
        try {
            $sql = "update {$this->tblSettingsDepartment} set ";
            $sql .= "department_is_active = :department_is_active, ";
            $sql .= "department_updated = :department_updated ";
            $sql .= "where department_aid = :department_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "department_is_active" => $this->department_is_active,
                "department_updated" => $this->department_updated,
                "department_aid" => $this->department_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function delete()
    {
        try {
            $sql = "delete from {$this->tblSettingsDepartment} ";
            $sql .= "where department_aid = :department_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "department_aid" => $this->department_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function checkName()
    {
        try {
            $sql = "select department_name ";
            $sql .= "from {$this->tblSettingsDepartment} ";
            $sql .= "where department_name = :department_name ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "department_name" => $this->department_name,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }
}
