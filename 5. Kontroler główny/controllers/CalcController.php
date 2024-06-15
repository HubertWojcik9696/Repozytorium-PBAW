<?php
require_once 'lib/smarty/Smarty.class.php';

class CalcController {
    public function calc() {
        $smarty = new Smarty();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pobranie danych z formularza
            $amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;
            $interest = isset($_POST['interest']) ? (float)$_POST['interest'] : 0;
            $years = isset($_POST['years']) ? (int)$_POST['years'] : 0;

            // Obliczenie raty miesięcznej
            $monthlyRate = $interest / 100 / 12;
            $numberOfPayments = $years * 12;
            $monthlyPayment = $amount * $monthlyRate / (1 - pow(1 + $monthlyRate, -$numberOfPayments));

            // Przekazanie wyników do szablonu
            $smarty->assign('amount', $amount);
            $smarty->assign('interest', $interest);
            $smarty->assign('years', $years);
            $smarty->assign('monthlyPayment', $monthlyPayment);
        }

        $smarty->display('templates/calc.html');
    }
}
?>
