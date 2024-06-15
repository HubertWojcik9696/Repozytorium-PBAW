<?php
/* Smarty version 3.1.30, created on 2024-06-13 21:06:50
  from "C:\xampp\htdocs\php_06_uproszczony\templates\calc.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_666b434a9d6950_60564612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90687ff0e029c7213a658303de948146fc7c00bb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_06_uproszczony\\templates\\calc.html',
      1 => 1718305606,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_666b434a9d6950_60564612 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="header">
    <h1>Przykład 06</h1>
    <h2>Kontroler główny</h2>
    <p>
        Aplikacja z jednym "punktem wejścia". Model MVC, w którym jeden główny kontroler używa różnych obiektów kontrolerów w zależności od wybranej akcji - przekazanej parametrem.
    </p>
</div>

<div class="content">


    <h3>Prosty kalkulator</h3>


    <form class="pure-form pure-form-stacked" action="/php_projects/php_06_uproszczony/app/ctrl.php?action=calcCompute" method="post">
        <fieldset>
            <label for="x">Pierwsza liczba</label>
            <input id="x" type="text" placeholder="wartość x" name="x" value="">
            <label for="op">Operacja</label>
            <select id="op" name="op">

                <option value="plus">(+) dodaj</option>
                <option value="minus">(-) odejmij </option>
                <option value="times">(*) pomnóż</option>
                <option value="div">(/) podziel</option>
            </select>

            <label for="y">Druga liczba</label>
            <input id="y" type="text" placeholder="wartość y" name="y" value="">
        </fieldset>
        <button type="submit" class="pure-button pure-button-primary">Oblicz</button>
    </form>

    <div class="messages">






    </div>


</div><!-- content -->

<div class="footer">
    <p>
        przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora
    </p>
    <p>
        Widok oparty na stylach <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>. (autor przykładu: Przemysław Kudłacik)
    </p>
</div>


</body>
</html>
<?php }
}
