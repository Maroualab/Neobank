<?php
include_once 'account.php';

class CurrentAccount extends Account{
private $overdraft_limit;
private $monthly_fee;

public function __construct($customerName, $balance,$email,$overDraftLimit,$monthly_fee) {
    $this->overdraft_limit=$overDraftLimit;
    $this->monthly_fee=$monthly_fee;
    parent::__construct($customerName,$balance,$email);
}
public function getOverdraftLimit(){
    return $this->overdraft_limit;
}
public function getMonthlyFee(){
    return $this->monthly_fee;
}

}
