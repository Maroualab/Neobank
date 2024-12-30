<?php

require_once realpath(path: __DIR__ . '/../') .'/includes/editAccount.php' ;
require_once realpath(__DIR__ . '/../') .'/includes/businessAccount.php' ;


if(isset($_GET['id'])){
    $id=$_GET['id'];
echo json_encode(EditAccount::GeteditAccount('businessaccount',$id));
}


if(isset($_POST["save"])){

    $id=$_POST['id'];
    $customerName=$_POST['name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
    $credit_limit=$_POST['transaction-fee'];
    $transaction_fee=$_POST['credit-limit'];


    $account=new BusinessAccount($customerName, $balance,$email,$credit_limit,$transaction_fee);

    EditAccount::editAccount($account,$id);

    header("location:../businessAccount/view_businessAccount.php");

}
