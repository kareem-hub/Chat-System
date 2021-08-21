<?php

class Msg
{
    protected $username;
    protected $msg;
    protected $date;

    public function __construct($username, $msg, $date)
    {
        $this->username = $username;
        $this->msg = $msg;
        $this->date = $date;
    }
    public function get_username()
    {
        return $this->username;
    }

    public function get_date()
    {
        return $this->date;
    }

    public function get_msg()
    {
        return $this->msg;
    }
}
