<?php
include_once 'account.php';
include_once '../connect/connect.php';

class EditAccount{

    public static function GeteditAccount($tableName,$id ) {
        global $pdo;
        $sql="SELECT * FROM customer JOIN $tableName ON customer.customer_id = $tableName.customer_id WHERE customer.customer_id = $id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function editAccount(Account $account ,$id) {
        global $pdo;
    $sql="UPDATE customer SET _name=:name , email=:email, balance=:balance WHERE customer_id=:id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "name"=>$account->getCustomerName(),
        "email"=>$account->getEmail(),
        "balance"=>$account->getBalance(),
        "id"=>$id
    ]);
    if($account instanceof BusinessAccount){
    $sql="UPDATE businessaccount SET credit_limit=:credit_limit , transaction_fee=:transactionfee WHERE customer_id=:id;";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
     "credit_limit"=>$account->getCreditLimit(),
     "transactionfee"=>$account->getTransactionFee(),
     "id"=>$id
    ]);

}else if($account instanceof CurrentAccount){
    $sql="UPDATE currentaccount SET overdraft_limit=:overdraft_limit , monthlyFee=:monthlyFee WHERE customer_id=:id;";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
     "overdraft_limit"=>$account->getOverdraftLimit(),
     "monthlyFee"=>$account->getMonthlyFee(),
     "id"=>$id
    ]);

    
}else if($account instanceof SavingsAccount){
    $sql="UPDATE savingsaccount SET interest_rate=:interest_rate , minimum_balance=:minimum_balance WHERE customer_id=:id;";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
     "interest_rate"=>$account->getInterestRate(),
     "minimum_balance"=>$account->getMinimumBalance(),
     "id"=>$id
    ]);

    
}



    }
}


