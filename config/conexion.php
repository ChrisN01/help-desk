<?php

session_start();

class Connect
{

    protected $dbh;

    protected function conexion()
    {
        try {
            $connect = $this->dbh=new PDO("mysql:local=localhost;dbname=helpdesk","root","");
            return $connect;
        } catch (Exception $e) {
            print "Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public function route()
    {
        return "http://localhost/cursoLaravel/help-desk/";
    }
}