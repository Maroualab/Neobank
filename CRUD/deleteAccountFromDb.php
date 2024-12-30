<?php
require_once realpath(__DIR__ . '/../') . '/includes/deleteAccount.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    DeleteAccount::DeleteAccount($id);
    
}


