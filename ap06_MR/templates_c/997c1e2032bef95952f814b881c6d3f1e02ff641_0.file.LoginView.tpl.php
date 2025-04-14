<?php
/* Smarty version 3.1.30, created on 2025-04-14 23:08:25
  from "G:\XAMPP\htdocs\Studia\ap06_MR\app\views\LoginView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67fd79494ab0a5_48928955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '997c1e2032bef95952f814b881c6d3f1e02ff641' => 
    array (
      0 => 'G:\\XAMPP\\htdocs\\Studia\\ap06_MR\\app\\views\\LoginView.tpl',
      1 => 1744664838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_67fd79494ab0a5_48928955 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_38664493767fd79494aac24_39774899', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_38664493767fd79494aac24_39774899 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<!-- Header -->
			<div id="header"></div>

				<div id="main">
					<!-- Logowanie -->
					<section id="kalkulator" class="two">
						<div class="container">
							<header>
								<h2>Logowanie do systemu</h2>
							</header>

							<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post">
								<fieldset class="log-screen">
									<div>
										<label for="id_login">login: </label>
										<input id="id_login" type="text" name="login"/>
									</div>
									<div>
										<label for="id_pass">pass: </label>
										<input id="id_pass" type="password" name="pass" /><br />
									</div>
									<div>
										<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
									</div>
								</fieldset>
								<div class="messages">

								<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


								<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
									<h4>Miesięczna Rata:</h4>
									<p class="res">
									<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
 PLN
									</p>
								<?php }?>
								</div>
							</form>
						</div>
				</div>
			</div>
				</section>

				
			



<?php
}
}
/* {/block 'content'} */
}
