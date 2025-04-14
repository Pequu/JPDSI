{extends file="main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<header>
	<h2>Kalkulator Kredytowy</h2>
</header>

<form action="{$conf->action_root}calcCompute" method="post" >
	<div class="row">
		<div class="col-4 col-12-mobile">Kwota<br><input type="text" name="kwota" placeholder="10000 PLN" value="{$form->kwota}"></div>
		<div class="col-4 col-12-mobile">Lata<br><input type="text" name="lata" placeholder="5 lat" value="{$form->lata}"></div>
		<div class="col-4 col-12-mobile">Oprocentowanie<input type="text" name="proc" placeholder="5 = 5%" value="{$form->proc}"></div>
		<div class="col-12">
			<input type="submit" value="Oblicz" />
		</div>
	</div>
</form>



<div class="messages">

	{* wyświeltenie listy błędów, jeśli istnieją *}
	{if $msgs->isError()}
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach $msgs->getErrors() as $err}
		{strip}
			<li>{$err}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
	
	{* wyświeltenie listy informacji, jeśli istnieją *}
	{if $msgs->isInfo()}
		<h4>Informacje: </h4>
		<ol class="inf">
		{foreach $msgs->getInfos() as $inf}
		{strip}
			<li>{$inf}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
	
	{if isset($res->result)}
		<h4>Miesięczna Rata:</h4>
		<p class="res">
		{$res->result} PLN
		</p>
	{/if}
	
	</div>
	
	{/block}