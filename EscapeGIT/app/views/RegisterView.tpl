{extends file="main.tpl"}

{block name=toptop}
<div class="container">
	<br>
	<form action="{$conf->action_root}register" method="post">
		<h2>Rejestracja Konta</h2><br>
			<div class="row">
				<div class="col-3 col-12-mobile">
					<label for="id_name" class="t-center">Imię:</label>
					<input id="id_name" type="text" name="name" value="{$form->name}"/>
				</div>
				<div class="col-3 col-12-mobile">
					<label for="id_surname" class="t-center">Nazwisko:</label>
					<input id="id_surname" type="text" name="surname" value="{$form->name}"/>
				</div>
				<div class="col-3 col-12-mobile">
					<label for="id_email" class="t-center">Email:</label>
					<input id="id_email" type="email" name="email" value="{$form->email}"/>
				</div>
				<div class="col-3 col-12-mobile">
					<label for="id_birth" class="t-center">Data Ur:</label>
					<input id="id_birth" type="date" name="birth" value="{$form->birth}"/>
				</div>
				<div class="col-4 col-12-mobile">
					<label for="id_login" class="t-center">login:</label>
					<input id="id_login" type="text" name="login" value="{$form->login}"/>
				</div>
				<div class="col-4 col-12-mobile">
					<label for="id_pass" class="t-center">Hasło:</label>
					<input id="id_pass" type="password" name="pass" />
				</div>
				<div class="col-4 col-12-mobile">
					<label for="id_pass" class="t-center">Powtórz Hasło:</label>
					<input id="id_pass2" type="password" name="pass2" />
				</div>
				<div  class="col-12 col-12-mobile">
					<input type="submit" value="Zarejestruj"/>
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
			<div class="col-12">
					<a href="{$conf->action_root}login">Masz konto? Zaloguj się</a>
				</div>
			<br>
			<br>
	</form>	
</div>
{/block}