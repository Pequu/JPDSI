<?php
/* Smarty version 3.1.30, created on 2025-06-06 16:31:27
  from "C:\Users\Mateusz\XAMPP\htdocs\Escape\app\views\WorkerPanel.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6842fbbfa863a3_13381487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '572801c58101d89c4a305c5db092e21d05fd236b' => 
    array (
      0 => 'C:\\Users\\Mateusz\\XAMPP\\htdocs\\Escape\\app\\views\\WorkerPanel.tpl',
      1 => 1749220283,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:WorkerPanelTable.tpl' => 1,
  ),
),false)) {
function content_6842fbbfa863a3_13381487 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10486792196842fbbfa85921_24952743', 'toptop');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'toptop'} */
class Block_10486792196842fbbfa85921_24952743 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container" style="padding: 1em">
    <div class="row admin-pan">
        <div class="col-12 col-12-mobile"><h1>Panel Pracownika</h1></div>

        <div id="search-bar" class="col-12">
            <h4>Opcje wyszukiwania</h4>
            <form id="search-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
workerPanelEdit">
                <input type="text" name="sf_searchData" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->searchData;?>
" placeholder="Szukaj.." />
                <label for="sf_searchCat">Sortowanie według</label>
                <select name="sf_searchCat" id="sf_searchCat">
                    <option value="roomName" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->searchCat == 'roomName') {?>selected<?php }?>>Nazwa pokoju</option>
                    <option value="resIsActive" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->searchCat == 'resIsActive') {?>selected<?php }?>>Status</option>
                    <option value="resDate" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->searchCat == 'resDate') {?>selected<?php }?>>Data</option>
                    <option value="resPrice" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->searchCat == 'resPrice') {?>selected<?php }?>>Cena</option>
                </select>
                <select name="sf_sortOpt" id="sf_sortOpt">
                    <option value="ASC" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->sortCatOpt == 'ASC') {?>selected<?php }?>>w górę</option>
                    <option value="DESC" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->sortCatOpt == 'DESC') {?>selected<?php }?>>w dół</option>
                </select>
            </form>
        </div>

        <div id="results">
            <?php $_smarty_tpl->_subTemplateRender("file:WorkerPanelTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'toptop'} */
}
