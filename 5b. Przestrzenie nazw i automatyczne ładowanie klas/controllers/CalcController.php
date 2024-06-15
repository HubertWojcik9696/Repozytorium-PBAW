<?php

namespace controllers;

use lib\smarty\Smarty;

class CalcController {
    public function calc() {
        global $smarty;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;
            $interest = isset($_POST['interest']) ? (float)$_POST['interest'] : 0;
            $years = isset($_POST['years']) ? (int)$_POST['years'] : 0;


            $monthlyRate = $interest / 100 / 12;
            $numberOfPayments = $years * 12;
            $monthlyPayment = $amount * $monthlyRate / (1 - pow(1 + $monthlyRate, -$numberOfPayments));


            $smarty->assign('amount', $amount);
            $smarty->assign('interest', $interest);
            $smarty->assign('years', $years);
            $smarty->assign('monthlyPayment', $monthlyPayment);
        }

        $smarty->display('calc.html');
    }
}
?>
