<?php

// This class will manage the connection to the database
// It will be passed on the other classes who need it
class DatabaseManager
{
    private string $host;
    private string $user;
    private string $password;
    private string $dbname;
    public PDO $connection;

    public function __construct(string $host, string $user, string $password, string $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect(): void
    {
        try{
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            echo 'Connection succesfull!';
        } 
        catch (PDOException $e){
            echo 'Connection failed:'. $e->getMessage();
        }

    }
}