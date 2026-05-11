<?php

class DirectReport
{
    public $direct_report_aid;
    public $direct_report_is_active;
    public $direct_report_subordinate_id;
    public $direct_report_supervisor_id;
    public $direct_report_created;
    public $direct_report_updated;

    public $supervisor_first_name;
    public $supervisor_last_name;
    public $supervisor_email;

    public $start;
    public $total;
    public $search;

    public $connection;
    public $lastInsertedId;

    public $tblDirectReport;
    public $tblEmployees;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblDirectReport = "settings_direct_report";
        $this->tblEmployees = "employees";
    }

    public function create()
    {
        try {
            $sql = "insert into {$this->tblDirectReport}";
            $sql .= " ( ";
            $sql .= " direct_report_is_active, ";
            $sql .= " direct_report_subordinate_id, ";
            $sql .= " direct_report_supervisor_id, ";
            $sql .= " direct_report_created, ";
            $sql .= " direct_report_updated ";
            $sql .= ") values (";
            $sql .= " :direct_report_is_active, ";
            $sql .= " :direct_report_subordinate_id, ";
            $sql .= " :direct_report_supervisor_id, ";
            $sql .= " :direct_report_created, ";
            $sql .= " :direct_report_updated ";
            $sql .= " ) ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "direct_report_is_active" => $this->direct_report_is_active,
                "direct_report_subordinate_id" => $this->direct_report_subordinate_id,
                "direct_report_supervisor_id" => $this->direct_report_supervisor_id,
                "direct_report_created" => $this->direct_report_created,
                "direct_report_updated" => $this->direct_report_updated,
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
            $sql = "select ";
            $sql .= " {$this->tblDirectReport}.*, ";
            $sql .= " sub.employee_first_name as subordinate_first_name, ";
            $sql .= " sub.employee_last_name as subordinate_last_name, ";
            $sql .= " sub.employee_email as subordinate_email, ";
            $sql .= " sup.employee_first_name as supervisor_first_name, ";
            $sql .= " sup.employee_last_name as supervisor_last_name, ";
            $sql .= " sup.employee_email as supervisor_email ";
            $sql .= " from {$this->tblDirectReport} ";
            $sql .= " left join {$this->tblEmployees} sub on {$this->tblDirectReport}.direct_report_subordinate_id = sub.employee_aid ";
            $sql .= " left join {$this->tblEmployees} sup on {$this->tblDirectReport}.direct_report_supervisor_id = sup.employee_aid ";
            $sql .= " where 1=1 ";
            $sql .= $this->direct_report_is_active != '' ? " and {$this->tblDirectReport}.direct_report_is_active = :direct_report_is_active " : " ";
            $sql .= $this->search != '' ? " and ( " : " ";
            $sql .= $this->search != '' ? " sub.employee_first_name like :sub_first_name " : " ";
            $sql .= $this->search != '' ? " or sub.employee_last_name like :sub_last_name " : " ";
            $sql .= $this->search != '' ? " or sup.employee_first_name like :sup_first_name " : " ";
            $sql .= $this->search != '' ? " or sup.employee_last_name like :sup_last_name " : " ";
            $sql .= $this->search != '' ? " ) " : " ";
            $query = $this->connection->prepare($sql);
            $params = [];
            if ($this->direct_report_is_active != '') {
                $params["direct_report_is_active"] = $this->direct_report_is_active;
            }
            if ($this->search) {
                $params["sub_first_name"] = "%{$this->search}%";
                $params["sub_last_name"] = "%{$this->search}%";
                $params["sup_first_name"] = "%{$this->search}%";
                $params["sup_last_name"] = "%{$this->search}%";
            }
            $query->execute($params);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function readLimit()
    {
        try {
            $sql = "select ";
            $sql .= " {$this->tblDirectReport}.*, ";
            $sql .= " sub.employee_first_name as subordinate_first_name, ";
            $sql .= " sub.employee_last_name as subordinate_last_name, ";
            $sql .= " sub.employee_email as subordinate_email, ";
            $sql .= " sup.employee_first_name as supervisor_first_name, ";
            $sql .= " sup.employee_last_name as supervisor_last_name, ";
            $sql .= " sup.employee_email as supervisor_email ";
            $sql .= " from {$this->tblDirectReport} ";
            $sql .= " left join {$this->tblEmployees} sub on {$this->tblDirectReport}.direct_report_subordinate_id = sub.employee_aid ";
            $sql .= " left join {$this->tblEmployees} sup on {$this->tblDirectReport}.direct_report_supervisor_id = sup.employee_aid ";
            $sql .= " where 1=1 ";
            $sql .= $this->direct_report_is_active != '' ? " and {$this->tblDirectReport}.direct_report_is_active = :direct_report_is_active " : " ";
            $sql .= $this->search != '' ? " and ( " : " ";
            $sql .= $this->search != '' ? " sub.employee_first_name like :sub_first_name " : " ";
            $sql .= $this->search != '' ? " or sub.employee_last_name like :sub_last_name " : " ";
            $sql .= $this->search != '' ? " or sup.employee_first_name like :sup_first_name " : " ";
            $sql .= $this->search != '' ? " or sup.employee_last_name like :sup_last_name " : " ";
            $sql .= $this->search != '' ? " ) " : " ";
            $sql .= " limit :start, :total ";
            $query = $this->connection->prepare($sql);
            $params = [
                "start" => $this->start - 1,
                "total" => $this->total,
            ];
            if ($this->direct_report_is_active != '') {
                $params["direct_report_is_active"] = $this->direct_report_is_active;
            }
            if ($this->search) {
                $params["sub_first_name"] = "%{$this->search}%";
                $params["sub_last_name"] = "%{$this->search}%";
                $params["sup_first_name"] = "%{$this->search}%";
                $params["sup_last_name"] = "%{$this->search}%";
            }
            $query->execute($params);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function update()
    {
        try {
            $sql = "update {$this->tblDirectReport} set ";
            $sql .= "direct_report_subordinate_id = :direct_report_subordinate_id, ";
            $sql .= "direct_report_supervisor_id = :direct_report_supervisor_id, ";
            $sql .= "direct_report_updated = :direct_report_updated ";
            $sql .= "where direct_report_aid = :direct_report_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "direct_report_subordinate_id" => $this->direct_report_subordinate_id,
                "direct_report_supervisor_id" => $this->direct_report_supervisor_id,
                "direct_report_updated" => $this->direct_report_updated,
                "direct_report_aid" => $this->direct_report_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function active()
    {
        try {
            $sql = "update {$this->tblDirectReport} set ";
            $sql .= "direct_report_is_active = :direct_report_is_active, ";
            $sql .= "direct_report_updated = :direct_report_updated ";
            $sql .= "where direct_report_aid = :direct_report_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "direct_report_is_active" => $this->direct_report_is_active,
                "direct_report_updated" => $this->direct_report_updated,
                "direct_report_aid" => $this->direct_report_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function delete()
    {
        try {
            $sql = "delete from {$this->tblDirectReport} ";
            $sql .= "where direct_report_aid = :direct_report_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "direct_report_aid" => $this->direct_report_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function readById()
    {
        try {
            $sql = "select * from {$this->tblDirectReport} ";
            $sql .= "where direct_report_aid = :direct_report_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "direct_report_aid" => $this->direct_report_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function checkSubordinateExist()
    {
        try {
            $sql = "select direct_report_aid from {$this->tblDirectReport} ";
            $sql .= "where direct_report_subordinate_id = :direct_report_subordinate_id ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "direct_report_subordinate_id" => $this->direct_report_subordinate_id,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function checkCircularReference()
    {
        try {
            // Check if proposed supervisor is already a subordinate of proposed subordinate
            $sql = "select direct_report_aid from {$this->tblDirectReport} ";
            $sql .= "where direct_report_subordinate_id = :supervisor_as_sub ";
            $sql .= "and direct_report_supervisor_id = :subordinate_as_sup ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "supervisor_as_sub" => $this->direct_report_supervisor_id,
                "subordinate_as_sup" => $this->direct_report_subordinate_id,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function getSupervisorById()
    {
        try {
            $sql = "select employee_first_name, employee_last_name, employee_email ";
            $sql .= "from {$this->tblEmployees} ";
            $sql .= "where employee_aid = :employee_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "employee_aid" => $this->direct_report_supervisor_id,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function updateEmployeeSupervisor()
    {
        try {
            $sql = "update {$this->tblEmployees} set ";
            $sql .= "employee_supervisor_id = :employee_supervisor_id, ";
            $sql .= "employee_supervisor_first_name = :employee_supervisor_first_name, ";
            $sql .= "employee_supervisor_last_name = :employee_supervisor_last_name, ";
            $sql .= "employee_supervisor_email = :employee_supervisor_email, ";
            $sql .= "employee_updated = :employee_updated ";
            $sql .= "where employee_aid = :employee_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "employee_supervisor_id" => $this->direct_report_supervisor_id,
                "employee_supervisor_first_name" => $this->supervisor_first_name,
                "employee_supervisor_last_name" => $this->supervisor_last_name,
                "employee_supervisor_email" => $this->supervisor_email,
                "employee_updated" => date("Y-m-d H:i:s"),
                "employee_aid" => $this->direct_report_subordinate_id,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function clearEmployeeSupervisor()
    {
        try {
            $sql = "update {$this->tblEmployees} set ";
            $sql .= "employee_supervisor_id = NULL, ";
            $sql .= "employee_supervisor_first_name = NULL, ";
            $sql .= "employee_supervisor_last_name = NULL, ";
            $sql .= "employee_supervisor_email = NULL, ";
            $sql .= "employee_updated = :employee_updated ";
            $sql .= "where employee_aid = :employee_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "employee_updated" => date("Y-m-d H:i:s"),
                "employee_aid" => $this->direct_report_subordinate_id,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }
}
