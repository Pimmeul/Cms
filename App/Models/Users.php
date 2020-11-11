<?php


namespace Models;


class Users
{
    /**
     * @var int
     */
    public $user_Id;
    /**
     * @var string
     */
    public $username;
    /**
     * @var string
     */
    public $email;
    /**
     * returns a hash
     * @var string
     */
    public $password;
    /**
     * @var array returns an array of ips
     */
    public $ips;
    /**
     * @var string returns a TimeStamps in 'YYYY-MM-DD hh:mm:ss' format
     */
    public $create_Time;
    /**
     * @var int
     */
    public $session_Session_Id;
}