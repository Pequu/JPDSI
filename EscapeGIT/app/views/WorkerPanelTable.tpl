    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>nazwa</th>
                <th>data</th>
                <th>Cena</th>
                <th>Płatność</th>
                <th>Nazwisko</th>
                <th>Status</th>
                <th>przełącz</th>
            </tr>
        </thead>
        <tbody>
            {foreach $records as $r}
            <tr>
                <td>{$r.idReservation}</td>
                <td>{$r.roomName}</td>
                <td>{$r.resDate}</td>
                <td>{$r.resPrice}zł</td>
                <td>{if $r.resPayment == 1}Gotówka{else if $r.resPayment == 2}Karta{/if}</td>
                <td>{$r.accSurname}</td>
                <td>{if $r.resIsActive}Aktywny{else}Nieaktywny{/if}</td>
                <td>
                    <form method="post" action="{$conf->action_root}toggleResActive">
                        <input type="hidden" name="res_id" value="{$r.idReservation}" />
                        <button type="submit">Przełącz status aktywności</button>
                    </form>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>

    <!-- Stronicowanie -->
    {if $totalPages > 1}
    <div class="pagination" style="margin-top: 1em;">
        {for $i=1 to $totalPages}
            {if $i == $currentPage}
                <span style="margin: 0 5px; font-weight: bold;">{$i}</span>
            {else}
                <a href="{$conf->action_root}workerPanel/{$i}" style="margin: 0 5px;">{$i}</a>
            {/if}
        {/for}
    </div>
    {/if}

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
