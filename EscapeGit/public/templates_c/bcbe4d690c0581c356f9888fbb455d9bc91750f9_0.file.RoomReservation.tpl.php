<?php
/* Smarty version 3.1.30, created on 2025-06-02 14:57:37
  from "C:\Users\Mateusz\XAMPP\htdocs\Escape\app\views\RoomReservation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_683d9fc15071f0_57147336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcbe4d690c0581c356f9888fbb455d9bc91750f9' => 
    array (
      0 => 'C:\\Users\\Mateusz\\XAMPP\\htdocs\\Escape\\app\\views\\RoomReservation.tpl',
      1 => 1748848463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_683d9fc15071f0_57147336 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_713751453683d9fc1506674_78195969', 'toptop');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'toptop'} */
class Block_713751453683d9fc1506674_78195969 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="container" style="padding: 2em">
    <h2>Rezerwacja pokoju</h2>

    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
roomReservation" method="post">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
" />
    <div class="row">
        <div class="col-12 col-12-mobile">
            <h4>Pokój: <?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
</h4>
        </div>

        <div class="col-12 col-12-mobile">
            <strong>Cena:</strong> <?php echo $_smarty_tpl->tpl_vars['form']->value->price;?>
 zł
        </div>

        <div class="col-12 col-12-mobile">
            <strong>Opis:</strong><br>
            <p><?php echo $_smarty_tpl->tpl_vars['form']->value->desc;?>
</p>
        </div>

        <div class="col-4 col-12-mobile">
            <label for="date">Data rezerwacji:</label>
            <input type="date" id="date" name="date" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->date;?>
" required>
        </div>

        <div class="col-4 col-12-mobile">
            <label for="voucher_code">Kod vouchera:</label>
            <input type="text" name="voucher_code" id="voucher_code" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form']->value->voucher_code, ENT_QUOTES, 'UTF-8', true);?>
" />
        </div>

        <div class="col-4 col-12-mobile">
            <label for="pay">Opcja zapłaty:</label>
            <select name="pay" id="pay">
                <option value="1">Gotówka</option>
                <option value="2">Karta</option>
            </select>
        </div>

        <div class="col-12 col-12-mobile">
            <input type="submit" value="Zarezerwuj">
        </div>

        <div class="col-12">
					<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
						<ul>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
							<li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</ul>
					<?php }?>
				</div>

    </form>
</div>

<?php
}
}
/* {/block 'toptop'} */
}
