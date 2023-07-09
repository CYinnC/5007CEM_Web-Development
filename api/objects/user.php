<?php
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "data";
  
    // object properties
    public $id;
    public $email;
    public $name;
    public $pw;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read user info
    function read(){
    
        // select all query
        $query = "SELECT
                    id, email, name, pw
                FROM
                    ". $this->table_name ." 
                ORDER BY
                    id ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // create user
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    email=:email, name=:name, pw=:pw" ;
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->pw=htmlspecialchars(strip_tags($this->pw));
        
    
        // bind values
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":pw", $this->pw);
        
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;    
    }

    // used when filling up the update user form (edit payment info)
    function readOne(){
        // query to read single record
        $query = "SELECT
                    id, email, name, pw
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of user info to be updated
        $stmt->bindParam(1, $this->id);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties //for the user
        $this->email = $row['email'];
        $this->name = $row['name'];
        $this->pw = $row['pw'];


    }

    // update the user info
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name
                    
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->id=htmlspecialchars(strip_tags($this->id));
        
    
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam("id", $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // delete the user
    function delete(){
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    function search($keywords){
    
        // select all query
        $query = "SELECT
                    id, email, name
                FROM
                    ". $this->table_name ." 
                WHERE
                    name LIKE ?
          
                    ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    }

?>