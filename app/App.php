<?php 

declare(strict_types=1);

function getTransactionFiles(string $dirPath) : array {
    $files = [];

    foreach(scandir($dirPath) as $file){
        if(is_dir($file)){
            continue;
        }

        $files[] = $dirPath . $file;
        
    }
    return $files;
}

function getTransactions(string $fileName) : array {
    if(! file_exists($fileName)) {
        echo "ERROR: File not found";
    }

    $transactions = [];
    $file = fopen($fileName, 'r'); 
    
    while( ($transaction = fgetcsv($file)) !== false ){
        $transactions[] = $transaction;
    }

    return $transactions;
}
