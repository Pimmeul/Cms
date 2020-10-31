<?php


namespace Database;
include('config/Models/Users.php');
include('config/Db/Mysql.php');
class Auth
{
    public $users;

    function __construct()
    {
        $this->users = new Users();
    }

    /**
     * @param $username
     */
    function get_User($username){
        $db = new Mysql();
        $db->db_Connect();
        $results = $db->find_By_Keyword('user','username',$username);
        while($row = $results->fetch()){
            $this->users->username = $row['username'];
            $this->users->password = $row['password'];
            $this->users->email = $row['email'];
            $this->users->user_Id = $row['userId'];
            $this->users->create_Time = $row['create_time'];
            $this->users->session_Session_Id = $row['session_sessionId'];
            //TODO add ip array
        }

    }

}