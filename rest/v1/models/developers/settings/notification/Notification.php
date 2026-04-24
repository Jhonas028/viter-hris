<?php

class Notification
{
    public $notification_aid;
    public $notification_is_active;
    public $notification_first_name;
    public $notification_last_name;
    public $notification_email;
    public $notification_purpose;
    public $notification_created;
    public $notification_updated;

    public $connection;
    public $start;
    public $total;
    public $search;
    public $lastInsertedId;

    public $tblNotification;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblNotification = "settings_notification";
    }

    public function create()
    {
        try {
            $sql = "insert into {$this->tblNotification}";
            $sql .= " ( ";
            $sql .= " notification_is_active, ";
            $sql .= " notification_first_name, ";
            $sql .= " notification_last_name, ";
            $sql .= " notification_email, ";
            $sql .= " notification_purpose, ";
            $sql .= " notification_created, ";
            $sql .= " notification_updated ";
            $sql .= ") values (";
            $sql .= " :notification_is_active, ";
            $sql .= " :notification_first_name, ";
            $sql .= " :notification_last_name, ";
            $sql .= " :notification_email, ";
            $sql .= " :notification_purpose, ";
            $sql .= " :notification_created, ";
            $sql .= " :notification_updated ";
            $sql .= " ) ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "notification_is_active" => $this->notification_is_active,
                "notification_first_name" => $this->notification_first_name,
                "notification_last_name" => $this->notification_last_name,
                "notification_email" => $this->notification_email,
                "notification_purpose" => $this->notification_purpose,
                "notification_created" => $this->notification_created,
                "notification_updated" => $this->notification_updated,
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
            $sql = "select * from {$this->tblNotification} ";
            $sql .= " where true ";
            $sql .= $this->notification_is_active != "" ? " and notification_is_active = :notification_is_active " : " ";
            $sql .= $this->search != '' ? " and ( " : " ";
            $sql .= $this->search != '' ? " notification_first_name like :notification_first_name " : " ";
            $sql .= $this->search != '' ? " or notification_last_name like :notification_last_name " : " ";
            $sql .= $this->search != '' ? " or notification_email like :notification_email " : " ";
            $sql .= $this->search != '' ? " or notification_purpose like :notification_purpose " : " ";
            $sql .= $this->search != '' ? " ) " : " ";
            $query = $this->connection->prepare($sql);
            $params = [];
            if ($this->notification_is_active != "") {
                $params["notification_is_active"] = $this->notification_is_active;
            }
            if ($this->search != '') {
                $params["notification_first_name"] = "%{$this->search}%";
                $params["notification_last_name"] = "%{$this->search}%";
                $params["notification_email"] = "%{$this->search}%";
                $params["notification_purpose"] = "%{$this->search}%";
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
            $sql = "select * from {$this->tblNotification} ";
            $sql .= " where true ";
            $sql .= $this->notification_is_active != "" ? " and notification_is_active = :notification_is_active " : " ";
            $sql .= $this->search != '' ? " and ( " : " ";
            $sql .= $this->search != '' ? " notification_first_name like :notification_first_name " : " ";
            $sql .= $this->search != '' ? " or notification_last_name like :notification_last_name " : " ";
            $sql .= $this->search != '' ? " or notification_email like :notification_email " : " ";
            $sql .= $this->search != '' ? " or notification_purpose like :notification_purpose " : " ";
            $sql .= $this->search != '' ? " ) " : " ";
            $sql .= " order by notification_aid desc ";
            $sql .= " limit :start, :total ";
            $query = $this->connection->prepare($sql);
            $params = [
                "start" => (int)$this->start - 1,
                "total" => (int)$this->total,
            ];
            if ($this->notification_is_active != "") {
                $params["notification_is_active"] = $this->notification_is_active;
            }
            if ($this->search != '') {
                $params["notification_first_name"] = "%{$this->search}%";
                $params["notification_last_name"] = "%{$this->search}%";
                $params["notification_email"] = "%{$this->search}%";
                $params["notification_purpose"] = "%{$this->search}%";
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
            $sql = " update {$this->tblNotification} set ";
            $sql .= " notification_first_name = :notification_first_name, ";
            $sql .= " notification_last_name = :notification_last_name, ";
            $sql .= " notification_email = :notification_email, ";
            $sql .= " notification_purpose = :notification_purpose, ";
            $sql .= " notification_updated = :notification_updated ";
            $sql .= " where notification_aid = :notification_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "notification_first_name" => $this->notification_first_name,
                "notification_last_name" => $this->notification_last_name,
                "notification_email" => $this->notification_email,
                "notification_purpose" => $this->notification_purpose,
                "notification_updated" => $this->notification_updated,
                "notification_aid" => $this->notification_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function active()
    {
        try {
            $sql = " update {$this->tblNotification} set ";
            $sql .= " notification_is_active = :notification_is_active, ";
            $sql .= " notification_updated = :notification_updated ";
            $sql .= " where notification_aid = :notification_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "notification_is_active" => $this->notification_is_active,
                "notification_updated" => $this->notification_updated,
                "notification_aid" => $this->notification_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function delete()
    {
        try {
            $sql = " delete from {$this->tblNotification} ";
            $sql .= " where notification_aid = :notification_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "notification_aid" => $this->notification_aid,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function checkName()
    {
        try {
            $sql = "select notification_first_name, notification_last_name ";
            $sql .= " from {$this->tblNotification} ";
            $sql .= " where notification_first_name = :notification_first_name ";
            $sql .= " and notification_last_name = :notification_last_name ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "notification_first_name" => $this->notification_first_name,
                "notification_last_name" => $this->notification_last_name,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }

    public function checkEmail()
    {
        try {
            $sql = "select notification_email ";
            $sql .= " from {$this->tblNotification} ";
            $sql .= " where notification_email = :notification_email ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "notification_email" => $this->notification_email,
            ]);
        } catch (PDOException $e) {
            $query = false;
        }
        return $query;
    }
}
