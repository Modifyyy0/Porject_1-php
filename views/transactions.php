<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
            span[style="color: red;"] {
            color: red;
        }
            span.negative {
                color: red;
            }

            span.positive {
                color: green;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(! empty($transactions)){
                        foreach($transactions as $transaction){
                            ?>
                                <tr>
                                    <td>
                                         <!-- Your code here -->
                                        <?= 
                                            formatDate($transaction[0])
                                        ?>
                                    </td>
                                    <td>
                                         <!-- Your code here -->
                                        <?= 
                                            $transaction[1]
                                        ?>
                                    </td>
                                    <td>
                                         <!-- Your code here -->
                                        <?= 
                                            $transaction[2]
                                        ?>
                                    </td>
                                    <td class="<?= $transaction[3] < 0 ? 'negative' : 'positive' ?>">
                                        <?= 
                                            formatDollarAmount((float) str_replace(['$', ','], ['', ''], $transaction[3])) 
                                        ?>
                                    </td>
                                    
                                </tr>
                            <?php 
                        }
                    }
                   
                ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><?= formatDollarAmount($totalIncome) ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expenses:</th>
                <td><?= formatDollarAmount($totalExpenses) ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Income:</th>
                <td><?= formatDollarAmount($netIncome) ?></td>
            </tr>
        </tfoot>
        </table>
    </body>
</html>
