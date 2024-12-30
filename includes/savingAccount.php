<?php
include_once 'account.php';

class SavingsAccount extends Account{
private $interest_rate;
private $minimum_balance;

public function __construct($customerName, $balance,$email,$interestRate,$minimum_balance) {
    parent::__construct($customerName,$balance,$email);
    $this->interest_rate=$interestRate;
    $this->minimum_balance=$minimum_balance;
}

public function getInterestRate(){
    return $this->interest_rate;
}
public function getMinimumBalance(){
    return $this->minimum_balance;
}

}
