<?php
include_once 'account.php';
class BusinessAccount extends Account{
private $credit_limit;
private $transaction_fee;

public function __construct($customerName, $balance,$email,$credit_limit,$transaction_fee) {
    $this->credit_limit=$credit_limit;
    $this->transaction_fee=$transaction_fee;
    parent::__construct($customerName,$balance,$email);
}
public function getCreditLimit(){
    return $this->credit_limit;
}
public function getTransactionFee(){
    return $this->transaction_fee;
}


}

