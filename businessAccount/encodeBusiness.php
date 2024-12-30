<?php
include '../includes/accountsManager.php' ;

    echo json_encode(AccountManager::select('businessaccount')); 


