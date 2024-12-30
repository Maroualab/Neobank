<?php 
class Account {

    protected $customerID;
    protected $customerName;
    protected $email;
    protected$balance;

    public function __construct($customerName,$balance,$email){
        $this->customerName = $customerName;
        $this->balance = $balance;
        $this->email =$email;
    }

    public function getCustomerID(){
        return $this ->customerID;
    }

    public function getCustomerName(){
        return $this ->customerName;
    }

    public function getBalance(){
        return $this ->balance;
    }

    public function getEmail(){
        return $this->email;
    }

}