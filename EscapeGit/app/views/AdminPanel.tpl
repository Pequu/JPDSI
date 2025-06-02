{extends file="main.tpl"}

{block name=toptop}
<div class="container" style="padding: 2em">
<div class="row admin-pan">
	<div class="col-12 col-12-mobile"><h1>Panel Admina</h1></div>
	<div class="col-12 col-12-mobile">
		<h2>Lista użytkowników</h2>

<hr/>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Login</th>
			<th>Nazwisko</th>
            <th>Rola</th>
            <th>Zmień role</th>
            <th>Status</th>
            <th>Przełącz status</th>
        </tr>
    </thead>
    <tbody>
        {foreach $users_with_roles as $u}
        <tr>
            <td>{$u.idAccount}</td>
            <td>{$u.accLogin}</td>
			<td>{$u.accSurname}</td>
            <td>{$u.roleName}</td>
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
            <td>{if $u.accIsActive}Aktywny{else}Nieaktywny{/if}</td>
            <td>
                <form method="post" action="{$conf->action_root}toggleUserActive">
                <input type="hidden" name="user_id" value="{$u.idAccount}" />
                <button type="submit">Przełącz status aktywności</button>
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
