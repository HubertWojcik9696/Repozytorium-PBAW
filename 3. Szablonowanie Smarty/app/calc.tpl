{extends file="../templates/main.tpl"}

{block name=footer} przykładowa tresć stopki {/block}

{block name=content}

<h2 class="content-head is-center">Kalkulator kredytowy</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="{$app_url}/app/calc.php" method="post">
		<fieldset>

			<label for="kwota">Kwota</label>
			<input id="kwota" type="text" placeholder="Podaj kwotę" name="kwota" value="{$form['kwota']}">

			<label for="lata">Lata</label>
			<input id="lata" type="text" placeholder="Podaj ilość lat" name="lata" value="{$form['lata']}">
					
			<label for="oprocentowanie">Oprocentowanie</label>
			<input id="oprocentowanie" type="text" placeholder="Podaj oprocentowanie" name="oprocentowanie" value="{$form['oprocentowanie']}">

			<button type="submit" class="pure-button">Oblicz</button>
		</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if isset($messages)}
	{if count($messages) > 0} 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if isset($infos)}
	{if count($infos) > 0} 
		<h4>Informacje: </h4>
		<ol class="inf">
		{foreach  $infos as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($result)}
	<h4>Wynik</h4>
	<p class="res">
	{$result}
	</p>
{/if}

</div>
</div>

{/block}