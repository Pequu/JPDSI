{extends file="main.tpl"}

{block name=toptop}
<div class="container" style="padding: 1em">
    <div class="row admin-pan">
        <div class="col-12 col-12-mobile"><h1>Panel Pracownika</h1></div>

        <div id="search-bar" class="col-12">
            <h4>Opcje wyszukiwania</h4>
            <form id="search-form" method="post" action="{$conf->action_root}workerPanelEdit">
                <input type="text" name="sf_searchData" value="{$searchForm->searchData}" placeholder="Szukaj.." />
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
            </form>
        </div>

        <div id="results">
            {include file="WorkerPanelTable.tpl"}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('search-form');
    const resultsContainer = document.getElementById('results');

    function submitAjax() {
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newContent = doc.querySelector('#results');
            if (newContent) {
                resultsContainer.innerHTML = newContent.innerHTML;
            }
        })
        .catch(error => {
            console.error('Błąd AJAX:', error);
        });
    }

    // debounce – opóźnia wysyłkę żądania o 300ms
    let debounceTimeout;
    function debounceSubmit() {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(submitAjax, 300);
    }

    form.addEventListener('input', function (e) {
        debounceSubmit();
    });

    form.addEventListener('change', function (e) {
        debounceSubmit();
    });
});
</script>

</script>
{/block}
