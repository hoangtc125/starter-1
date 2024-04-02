<?php

namespace app\src\model;

class Account extends Model
{
    private string $username;
    private string $email;
    private string $first_name;
    private string $last_name;
    private string $hash_password;
    private string $created_at;
}