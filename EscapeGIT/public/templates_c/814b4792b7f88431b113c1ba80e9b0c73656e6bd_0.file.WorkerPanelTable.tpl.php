<?php
/* Smarty version 3.1.30, created on 2025-06-06 16:28:54
  from "C:\Users\Mateusz\XAMPP\htdocs\Escape\app\views\WorkerPanelTable.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6842fb266e9e76_04465170',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '814b4792b7f88431b113c1ba80e9b0c73656e6bd' => 
    array (
      0 => 'C:\\Users\\Mateusz\\XAMPP\\htdocs\\Escape\\app\\views\\WorkerPanelTable.tpl',
      1 => 1749220117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6842fb266e9e76_04465170 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <!-- TABELA I WYNIKI -->
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

    <!-- PAGINACJA -->
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

    <!-- KOMUNIKATY -->
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
    <?php }
}
}
