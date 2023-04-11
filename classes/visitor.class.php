<?php

class Visitor extends Dbh{
    
    public function index(){
        $sql = "SELECT * FROM visitors"; 
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0){
            return $result;
        } else{
            return false;
        }
    }

    public function showVisitor($id){
        $sql = "SELECT * FROM visitors WHERE id = '$id'"; 
        $result = $this->connect()->query($sql);
        if($result->rowCount() > 0){
            return $result;
        } else{
            return false;
        }
    }
}
