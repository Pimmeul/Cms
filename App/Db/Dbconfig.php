<?php


namespace Database;


class Dbconfig
{
    protected $server_Name;
    protected $db_Name;
    protected $username;
    protected $password;

    function __construct(){
        $this->server_Name = 'localhost';
        $this->db_Name = 'cms';
        $this->username = 'root';
        $this->password = '';
    }
}