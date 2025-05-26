<?php
/* Smarty version 3.1.30, created on 2025-05-25 23:37:33
  from "G:\XAMPP\htdocs\Escape\app\views\AdminPanel.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_68338d9dd71b96_96329569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a980b9e009edfe372348335454b8b3a985c3981d' => 
    array (
      0 => 'G:\\XAMPP\\htdocs\\Escape\\app\\views\\AdminPanel.tpl',
      1 => 1748209053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_68338d9dd71b96_96329569 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_83568126168338d9dd71775_56255992', 'toptop');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'toptop'} */
class Block_83568126168338d9dd71775_56255992 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container" style="padding: 2em">
<div class="row admin-pan">
	<div class="col-12 col-12-mobile"><h1>Panel Admina</h1></div>
	<div class="col-12 col-12-mobile">
		<h2>Lista użytkowników i ich ról</h2>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
toggleUserActive">
    <label>Wybierz użytkownika:
        <select name="user_id">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users_with_roles']->value, 'u');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['u']->value['idAccount'];?>
"><?php echo $_smarty_tpl->tpl_vars['u']->value['accName'];?>
 (<?php echo $_smarty_tpl->tpl_vars['u']->value['roleName'];?>
) - <?php if ($_smarty_tpl->tpl_vars['u']->value['accIsActive']) {?>aktywny<?php } else { ?>nieaktywny<?php }?></option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users_with_roles']->value, 'u');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['u']->value['idAccount'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['u']->value['accName'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['u']->value['accSurname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['u']->value['roleName'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['u']->value['accBirthDate'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['u']->value['accIsActive']) {?>Aktywny<?php } else { ?>Nieaktywny<?php }?></td>
            <td>
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
updateUserRole" style="display:inline-block;">
                    <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['idAccount'];?>
" />
                    <select name="role_id">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['idRole'];?>
" <?php if ($_smarty_tpl->tpl_vars['r']->value['roleName'] == $_smarty_tpl->tpl_vars['u']->value['roleName']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value['roleName'];?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                    <button type="submit">Zmień</button>
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
</form>
</div>

<?php
}
}
/* {/block 'toptop'} */
}
