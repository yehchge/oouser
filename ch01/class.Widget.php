<?php

class Widget {

    private $id;
    private $name;
    private $description;
    private $hDB;
    private $needsUpdating = false;

    public function __construct($widgetID) {
        // The widgetID parameter is the primary key of a 
        // record in the database containing the information
        // for this object

        try{
            // Create a connection handle and store it in a private member variable
            $this->hDB = new PDO("mysql:host=localhost;dbname=parts", 'root', '123456',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼

            $this->hDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo "Could not connect:: localhost<br>\n";
            echo $e->getMessage()."<br>\n";
            exit;
        }catch (Exception $e){
            echo "Could not connect: localhost<br>\n";
            echo $e->getMessage()."<br>\n";
            exit;
        }
        
        $sql = "SELECT name,description FROM widget WHERE widgetid = $widgetID";
        $rs = $this->hDB->prepare($sql);
        $rs->execute();
        if(!$rs->rowCount()) {
            throw new Exception('The specified widget does not exist!');
        }
        $data = $rs->fetch(PDO::FETCH_BOTH);
        $this->id = $widgetID;
        $this->name = $data['name'];
        $this->description = $data['description'];
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setName($name) {
        $this->name = $name;
        $this->needsUpdating = true;
    }

    public function setDescription($description) {
        $this->description = $description;
        $this->needsUpdating = true;
    }

    // 解除物件
    public function __destruct() {
        if(! $this->needsUpdating){
            return;
        }

        $sql = "UPDATE widget SET ";
        $sql .= "name = ?, ";
        $sql .= "description = ? ";
        $sql .= "WHERE widgetID = ?";

        $rs = $this->hDB->prepare($sql);
        $rs->execute(array($this->name, $this->description, $this->id));

        // You're done with the database. Close the connection handle.
        $this->hDB = NULL;
    }

}

?>
