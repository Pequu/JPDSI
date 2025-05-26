{extends file="main.tpl"}

{block name=content}

<div class="container">
<form action="{$conf->action_url}personList">
	<h3>Opcje wyszukiwania</h3>
	<div class="row">
		<div class="col-4 col-12-mobile"><input type="text" placeholder="nazwa" name="sf_surname" value="{$searchForm->surname}" /></div>
		<div class="col-4 col-12-mobile"><button type="submit" >Filtruj</button></div>
	</div>
</form>
</div>	


<div class="container">
<a href="{$conf->action_root}personNew">+ Nowa osoba</a>
</div>	

<div class="container">
	
	{foreach $people as $p}
	{strip}
		<div class="col-4 col-12-mobile">
			{$p["name"]}<br>
			{$p["surname"]}<br>
			{$p["birthdate"]}<br>
				// <a href="{$conf->action_url}personEdit/{$p['idperson']}">Edytuj</a>
				// &nbsp;
				// <a href="{$conf->action_url}personDelete/{$p['idperson']}">Usuń</a> <br>
			
	{/strip}
	</div>
	{/foreach}
</div>

{/block}
