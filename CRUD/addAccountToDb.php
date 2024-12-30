<?php
// echo realpath(__DIR__ . '/../') . '/includes/accountsManager.php';
require_once realpath(__DIR__ . '/../') . '/includes/accountsManager.php';
require_once realpath(__DIR__ . '/../') .'/includes/businessAccount.php' ;
require_once realpath(__DIR__ . '/../') . '/includes/currentAccount.php' ;
require_once realpath(path: __DIR__ . '/../') .'/includes/savingAccount.php' ;

if(isset($_POST['submit'])){

    $customerName=$_POST['holder_name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
    $account_type=$_POST['account_type'];

    if($account_type=='current'){
        $overdraft_limit=$_POST['overdraftLimit'];
        $monthly_fee=$_POST['monthlyFee'];
        $account=new CurrentAccount($customerName, $balance,$email,$overdraft_limit,$monthly_fee);
        AccountManager::insert($account);
    }
    else if($account_type=='savings'){
        $interest_rate=$_POST['interest_rate'];
        $minimum_balance=$_POST['minimum_balance'];
        $account=new SavingsAccount($customerName, $balance,$email,$interestRate,$minimum_balance);
        AccountManager::insert($account);
    }
    else if($account_type=='business'){
        $credit_limit=$_POST['creditLimit'];
        $transaction_fee=$_POST['transactionFee'];

        $account=new BusinessAccount($customerName, $balance,$email,$credit_limit,$transaction_fee);
        AccountManager::insert($account);
        
    }
    header('Location:../index.php');

}
