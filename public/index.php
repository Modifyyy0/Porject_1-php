<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . "App.php";


require APP_PATH . "helpers.php";

$files = getTransactionFiles(FILES_PATH);

$transactions = [];

foreach ($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file));
}

$totalIncome = 0;
$totalExpenses = 0;

foreach ($transactions as $transaction) {
    $amount = (float) str_replace(['$', ','], ['', ''], $transaction[3]);

    if ($amount > 0) {
        $totalIncome += $amount;
    } else {
        $totalExpenses += $amount;
    }
}

$netIncome = $totalIncome + $totalExpenses;


require VIEWS_PATH . "transactions.php";


?>


