<?php

namespace app\src\adapter;
use app\src\core\Application;
use PDO;

class AccountAdapter
{
    public function get_one_by_username(string $username)
    {
        $sql = "SELECT *
                FROM account 
                WHERE account.username=:username;
                ";
        $statement = Application::$app->db->pdo->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?? null;
    }
}