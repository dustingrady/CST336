<?php

function getDepartments()
    {
        global $conn;
        $sql = "SELECT id, name FROM department ORDER BY name";
        $stmt = $conn -> prepare ($sql);
        $stmt -> execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($records);
        return $records;
    }
    
    function getUserInfo($id){
        global $conn;
        $sql = "SELECT * FROM user WHERE id = $id"; 
        $stmt = $conn -> prepare ($sql);
        $stmt -> execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
        
    }
    
    
    ?>
    