<?php
class Database {
    public function __construct()
    {
        /*** mysql hostname ***/
        $hostname = 'localhost';
        /*** mysql username ***/
        $username = 'root';
        /*** mysql password ***/
        $password = 'opgepacked';

        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=open_reconcile", $username, $password);
            /*** echo a message saying we have connected ***/
            echo 'Connected to database';
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        return $dbh;
    }
}
