<?php
include_once 'account.php';
include_once '../connect/connect.php';


class AccountManager {
    public static function insert(Account $account) {
        global $pdo;
    
        
            $sql = "INSERT INTO `customer` (`_name`, `email`, `balance`) VALUES (:name, :email, :balance)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "name" => $account->getCustomerName(),
                "email" => $account->getEmail(),
                "balance" => $account->getBalance()
            ]);
            $lastId = $pdo->lastInsertId();
            // echo "Customer inserted with ID: $lastId<br>";
    
            if ($account instanceof CurrentAccount) {
                $sql = "INSERT INTO `currentaccount` (`customer_id`, `overdraft_limit`, `monthlyFee`) VALUES (:id, :overdraft_limit, :monthlyFee)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "id" => $lastId,
                    "overdraft_limit" => $account->getOverdraftLimit(),
                    "monthlyFee" => $account->getMonthlyFee()
                ]);
                // echo "Current account details inserted.<br>";
            } else if ($account instanceof BusinessAccount) {
                $sql = "INSERT INTO `businessaccount` (`customer_id`, `credit_limit`, `transaction_fee`) VALUES (:id, :credit_limit, :transaction_fee)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "id" => $lastId,
                    "credit_limit" => $account->getCreditLimit(),
                    "transaction_fee" => $account->getTransactionFee()
                ]);
                // echo "Business account details inserted.<br>";
            } else if ($account instanceof SavingsAccount) {
                $sql = "INSERT INTO `savingsaccount` (`customer_id`, `interest_rate`, `minimum_balance`) VALUES (:id, :interest_rate, :minimum_balance)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "id" => $lastId,
                    "interest_rate" => $account->getInterestRate(),
                    "minimum_balance" => $account->getMinimumBalance()
                ]);
                // echo "Savings account details inserted.<br>";
            }
        
    }
    
    public static function select($tableName) {
        global $pdo;
        $sql = "SELECT * FROM customer JOIN $tableName ON customer.customer_id=$tableName.customer_id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
