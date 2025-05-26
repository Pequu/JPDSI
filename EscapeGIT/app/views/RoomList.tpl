{extends file="main.tpl"}

{block name=content}

<div class="container">
<form action="{$conf->action_url}roomList#pokoje">
	<h2>Escape Roomy</h2><br>
	<h4>Opcje wyszukiwania</h4>
	<div class="row">
		<div class="col-4 col-12-mobile"><input type="text" placeholder="nazwa" name="sf_roomName" value="{$searchForm->roomName}" /></div>
		<div class="col-4 col-12-mobile"><button type="submit" >Filtruj</button></div>
	</div>
</form>
</div>	


<div class="container">
<a href="{$conf->action_root}personNew">+ Nowa osoba</a>
</div>	

<div class="container">
	<div class="row">
	{foreach $rooms as $r}
	{strip}
		<div class="col-4 col-12-mobile">
		<div class="room-disp">
			<span class="image br"><img src="{$conf->asset_path}/images/{$r["roomCover"]}.jpg" alt="logo" /></span>
			<p>{$r["roomName"]}, {$r["roomPrice"]}zł  <br><br>
				 {$r["roomDescription"]}
				 <a href="{$conf->action_url}personEdit/{$r['idRoom']}"><h4>Rezerwuj</a> | <a href="{$conf->action_url}personDelete/{$r['idRoom']}">Usuń</h4></a>
			</p>		
		</div>
	{/strip}
	</div>
	{/foreach}
	</div>
</div>

{/block}
