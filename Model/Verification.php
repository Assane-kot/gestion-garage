<?php

  class Verification {
  private $servername = 'localhost';
  private $username = 'root';
  private $password = '';
  private $dbname = 'gestiongarage';

  public function __construct($username = false, $password = false, $dbname = false, $servername = false) {
   if ($username) $this->username = $username;
   if ($password) $this->password = $password;
   if ($dbname) $this->dbname = $dbname;
   if ($servername) $this->servername = $servername;
  }
  /*
     * @return PDO
     */
    public function Connection()
    {

        $dsn = "mysql:dbname=".$this->dbname.";host=".$this->servername;
        $dbh = "";
        try
        {
            $dbh = new PDO($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch (PDOException $exception)
        {
          echo "RunDatabase ::Exception :".$exception->getMessage();
        }
        return $dbh;

        
    }

  public function getUsername(){
    return $this->username;
  }
  public function getPassword(){
    return $this->password;
  }
  public function getDbname(){
    return $this->dbname;
  }
  public function getServername(){
    return $this->servername;
  }

  public function setPassword($password){
    $this->password = $password;
  }
  public function setUsername($username){
    $this->username = $username;
  }
  public  function setDbname($dbname){
    $this->dbname = $dbname;
  }
  public function setServername($servername){
    $this->servername = $servername;
  }
    
}