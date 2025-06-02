{extends file="main.tpl"}

{block name=toptop}
<div class="container" style="padding: 1em">
<div class="row admin-pan">
	<div class="col-12 col-12-mobile"><h1>Panel Pracownika</h1></div>
	<div id="results">
		<h2>Lista rezerwacji</h2>

<hr/>
<h4>Opcje wyszukiwania</h4>

    <form id="search-form" method="post" action="{$conf->action_root}workerPanelEdit">
        <div class="col-6 col-12-mobile">
            <input type="text" name="sf_searchData" value="{if isset($searchForm)}{$searchForm->searchData}{/if}" placeholder="Szukaj.." />
        </div><br>
        <div class="col-6 col-12-mobile">
                <label for="sf_searchCat">Sortowanie według</label>
            <select name="sf_searchCat" id="sf_searchCat">
                <option value="roomName" {if $searchForm->searchCat == 'roomName'}selected{/if}>Nazwa pokoju</option>
                <option value="resIsActive" {if $searchForm->searchCat == 'resIsActive'}selected{/if}>Status</option>
                <option value="resDate" {if $searchForm->searchCat == 'resDate'}selected{/if}>Data</option>
                <option value="resPrice" {if $searchForm->searchCat == 'resPrice'}selected{/if}>Cena</option>
            </select>
            <select name="sf_sortOpt" id="sf_sortOpt">
                <option value="ASC" {if $searchForm->sortCatOpt == 'ASC'}selected{/if}>w górę</option>
                <option value="DESC" {if $searchForm->sortCatOpt == 'DESC'}selected{/if}>w dół</option>
            </select>
        </div>
        <button type="submit">Szukaj</button> 
    </form>
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
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('search-form');
    form.addEventListener('submit', function (e) {
        e.preventDefault(); // zapobiega przeładowaniu strony

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(html => {
            // Wyodrębnij tylko zawartość #results z otrzymanego HTML
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newContent = doc.querySelector('#results');

            document.getElementById('results').innerHTML = newContent.innerHTML;
        })
        .catch(error => {
            console.error('Błąd AJAX:', error);
        });
    });
});
</script>

{/block}
