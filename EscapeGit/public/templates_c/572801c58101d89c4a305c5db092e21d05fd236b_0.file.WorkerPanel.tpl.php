<?php
/* Smarty version 3.1.30, created on 2025-06-02 22:01:51
  from "C:\Users\Mateusz\XAMPP\htdocs\Escape\app\views\WorkerPanel.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_683e032fd95e94_03031186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '572801c58101d89c4a305c5db092e21d05fd236b' => 
    array (
      0 => 'C:\\Users\\Mateusz\\XAMPP\\htdocs\\Escape\\app\\views\\WorkerPanel.tpl',
      1 => 1748894480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_683e032fd95e94_03031186 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_142932769683e032fd954d6_40034484', 'toptop');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'toptop'} */
class Block_142932769683e032fd954d6_40034484 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container" style="padding: 1em">
<div class="row admin-pan">
	<div class="col-12 col-12-mobile"><h1>Panel Pracownika</h1></div>
	<div id="results">
		<h2>Lista rezerwacji</h2>

<hr/>
<h4>Opcje wyszukiwania</h4>

    <form id="search-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
workerPanelEdit">
        <div class="col-6 col-12-mobile">
            <input type="text" name="sf_searchData" value="<?php if (isset($_smarty_tpl->tpl_vars['searchForm']->value)) {
echo $_smarty_tpl->tpl_vars['searchForm']->value->searchData;
}?>" placeholder="Szukaj.." />
        </div><br>
        <div class="col-6 col-12-mobile">
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['records']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['r']->value['idReservation'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['r']->value['roomName'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['r']->value['resDate'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['r']->value['resPrice'];?>
zł</td>
            <td><?php if ($_smarty_tpl->tpl_vars['r']->value['resPayment'] == 1) {?>Gotówka<?php } elseif ($_smarty_tpl->tpl_vars['r']->value['resPayment'] == 2) {?>Karta<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['r']->value['accSurname'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['r']->value['resIsActive']) {?>Aktywny<?php } else { ?>Nieaktywny<?php }?></td>
            <td>
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
toggleResActive">
                <input type="hidden" name="res_id" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['idReservation'];?>
" />
                <button type="submit">Przełącz status aktywności</button>
                </form>
            </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table>

<?php if ($_smarty_tpl->tpl_vars['totalPages']->value > 1) {?>
<div class="pagination" style="margin-top: 1em;">
    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['totalPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['totalPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
        <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['currentPage']->value) {?>
            <span style="margin: 0 5px; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</span>
        <?php } else { ?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
workerPanel/<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="margin: 0 5px;"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
        <?php }?>
    <?php }
}
?>

</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
    <ul class="info">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?><li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li><?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
    <ul class="error">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?><li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li><?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
<?php }?>
</div>

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'toptop'} */
}
