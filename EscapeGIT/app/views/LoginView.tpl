{extends file="main.tpl"}

{block name=logging}
<div class="container">
	<br>
	<form action="{$conf->action_root}login" method="post">
		<h2>Logowanie do systemu</h2><br>
			<div class="row">
				<div class="col-6 col-12-mobile">
					<label for="id_login" class="t-center">login:</label>
					<input id="id_login" type="text" name="login" value="{$form->login}"/>
				</div>
				<div class="col-6 col-12-mobile">
					<label for="id_pass" class="t-center">pass:</label>
					<input id="id_pass" type="password" name="pass" />
				</div>
				<div  class="col-12 col-12-mobile">
					<input type="submit" value="zaloguj"/>
				</div>

				<div class="col-12">
					{if $msgs->isError()}
						<ul>
						{foreach $msgs->getMessages() as $msg}
							<li>{$msg->text}</li>
						{/foreach}
						</ul>
					{/if}
				</div>
			</div>
			<br>
	</form>	
</div>
{/block}


<div class="container">
<form action="{$conf->action_url}personList">
	<h3>Opcje wyszukiwania</h3>
	<div class="row">
		<div class="col-4 col-12-mobile"><input type="text" placeholder="nazwa" name="sf_surname" value="{$searchForm->surname}" /></div>
		<div class="col-4 col-12-mobile"><button type="submit" >Filtruj</button></div>
	</div>
</form>
</div>	