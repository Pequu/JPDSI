{extends file="main.tpl"}

{block name=toptop}

<div class="container">
<div class="row" style="padding: 2em">
<div class="col-12">
<form action="{$conf->action_root}personSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div>
            <label for="name">imię</label>
            <input id="name" type="text" placeholder="imię" name="name" value="{$form->name}">
        </div>
		<div>
            <label for="surname">nazwisko</label>
            <input id="surname" type="text" placeholder="nazwisko" name="surname" value="{$form->surname}">
        </div>
		<div>
            <label for="birthdate">data ur.</label>
            <input id="birthdate" type="text" placeholder="data ur." name="birthdate" value="{$form->birthdate}">
        </div><br>
		<div>
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}personList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>
</div>

{/block}
