<?php
include_once 'account.php';
include_once '../connect/connect.php';

class DeleteAccount{
    public static function DeleteAccount($id)  {
        global $pdo;
        $sql="DELETE FROM `customer` WHERE customer_id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "id"=>$id
        ]);
        
    }
}

