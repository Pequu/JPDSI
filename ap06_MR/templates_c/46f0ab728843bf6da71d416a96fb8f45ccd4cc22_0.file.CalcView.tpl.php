<?php
/* Smarty version 3.1.30, created on 2025-04-14 23:35:07
  from "G:\XAMPP\htdocs\Studia\ap06_MR\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67fd7f8b82c386_63807675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46f0ab728843bf6da71d416a96fb8f45ccd4cc22' => 
    array (
      0 => 'G:\\XAMPP\\htdocs\\Studia\\ap06_MR\\app\\views\\CalcView.tpl',
      1 => 1744666506,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_67fd7f8b82c386_63807675 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_61394328467fd7f8b82bd68_94626178', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_61394328467fd7f8b82bd68_94626178 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<div class="log">
	<section id="log-info" style="padding-right:0.5em">
		użytkownik: <span style="font-weight: 400"><?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</span>, rola: <span style="font-weight: 400"><?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
&nbsp;&nbsp;&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="">wyloguj</a></span>
	</section>
	</div>

<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/images/avatar.jpg" alt="" /></span>
							<h1 id="title">Mateusz Rzymowski</h1>
							<p>Student 2 roku</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#kalkulator" id="kalk-link"><span class="icon solid fa-th">Kalkulator</span></a></li>
								<li><a href="#top" id="top-link"><span class="icon solid fa-home">Intro</span></a></li>
								<li><a href="#about" id="about-link"><span class="icon solid fa-user">About Me</span></a></li>
								<li><a href="#contact" id="contact-link"><span class="icon solid fa-envelope">Contact</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">
				<!-- kalkulator -->
				<section id="kalkulator" class="two">
					<div class="container">
						<header>
							<h2>Kalkulator Kredytowy</h2>
						</header>

						<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post" >
							<div class="row">
								<div class="col-4 col-12-mobile">Kwota<br><input type="text" name="kwota" placeholder="10000 PLN" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
"></div>
								<div class="col-4 col-12-mobile">Lata<br><input type="text" name="lata" placeholder="5 lat" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lata;?>
"></div>
								<div class="col-4 col-12-mobile">Oprocentowanie<input type="text" name="proc" placeholder="5 = 5%" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->proc;?>
"></div>
								<div class="col-12">
									<input type="submit" value="Oblicz" />
								</div>
							</div>
						</form>

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

					</div>
				</section>

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Hi! I'm <strong>Prologue</strong>, a <a href="http://html5up.net/license">free</a> responsive<br />
								site template designed by <a href="http://html5up.net">HTML5 UP</a>.</h2>
								<p>Ligula scelerisque justo sem accumsan diam quis<br />
								vitae natoque dictum sollicitudin elementum.</p>
							</header>

							<footer>
								<a href="#portfolio" class="button scrolly">Magna Aliquam</a>
							</footer>

						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>About Me</h2>
							</header>

							<a href="#" class="image featured"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/images/pic08.jpg" alt="" /></a>

							<p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus
							ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae
							laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem
							parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper
							dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec
							ornare iaculis.</p>

						</div>
					</section>

				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<header>
								<h2>Contact</h2>
							</header>

							<p>Elementum sem parturient nulla quam placerat viverra
							mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia
							donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc
							orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>

							<form method="post" action="#">
								<div class="row">
									<div class="col-6 col-12-mobile"><input type="text" name="name" placeholder="Name" /></div>
									<div class="col-6 col-12-mobile"><input type="text" name="email" placeholder="Email" /></div>
									<div class="col-12">
										<textarea name="message" placeholder="Message"></textarea>
									</div>
									<div class="col-12">
										<input type="submit" value="Send Message" />
									</div>
								</div>
							</form>

						</div>
					</section>

			</div>

	
	<?php
}
}
/* {/block 'content'} */
}
