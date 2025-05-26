{extends file="main.tpl"}

{block name=toptop}
<div class="container" style="padding: 2em">
<div class="row admin-pan">
	<div class="col-12 col-12-mobile"><h1>Panel Admina</h1></div>
	<div class="col-12 col-12-mobile">
		<h2>Lista użytkowników i ich ról</h2>

<form method="post" action="{$conf->action_root}toggleUserActive">
    <label>Wybierz użytkownika:
        <select name="user_id">
            {foreach $users_with_roles as $u}
                <option value="{$u.idAccount}">{$u.accName} ({$u.roleName}) - {if $u.accIsActive}aktywny{else}nieaktywny{/if}</option>
            {/foreach}
        </select>
    </label>
    <button type="submit">Przełącz status aktywności</button>
</form>

<hr/>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imię</th>
			<th>Nazwisko</th>
            <th>Rola</th>
			<th>Data Ur</th>
            <th>Status</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        {foreach $users_with_roles as $u}
        <tr>
            <td>{$u.idAccount}</td>
            <td>{$u.accName}</td>
			<td>{$u.accSurname}</td>
            <td>{$u.roleName}</td>
			<td>{$u.accBirthDate}</td>
            <td>{if $u.accIsActive}Aktywny{else}Nieaktywny{/if}</td>
            <td>
                <form method="post" action="{$conf->action_root}updateUserRole" style="display:inline-block;">
                    <input type="hidden" name="user_id" value="{$u.idAccount}" />
                    <select name="role_id">
                        {foreach $roles as $r}
                            <option value="{$r.idRole}" {if $r.roleName == $u.roleName}selected{/if}>{$r.roleName}</option>
                        {/foreach}
                    </select>
                    <button type="submit">Zmień</button>
                </form>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>

  {if $msgs->isInfo()}
		<ul class="info">
			{foreach $msgs->getMessages() as $msg}
				{if $msg->isInfo()}<li>{$msg->text}</li>{/if}
			{/foreach}
		</ul>
	{/if}

	{if $msgs->isError()}
		<ul class="error">
			{foreach $msgs->getMessages() as $msg}
				{if $msg->isError()}<li>{$msg->text}</li>{/if}
			{/foreach}
		</ul>
	{/if}
</form>
</div>

{/block}
