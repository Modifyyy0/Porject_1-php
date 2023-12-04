<?php

function formatDollarAmount(float $amount) {
    if ($amount < 0) {
        return '<span style="color: red;">-$' . number_format(abs($amount), 2) . '</span>';
    } else {
        return '<span style="color: green;">$' . number_format($amount, 2) . '</span>';
    }
}

function formatDate(string $date) {
    return date('M j, Y', strtotime($date));
}

