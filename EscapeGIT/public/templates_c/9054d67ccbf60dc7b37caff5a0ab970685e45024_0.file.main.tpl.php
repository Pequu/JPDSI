<?php
/* Smarty version 3.1.30, created on 2025-05-19 20:58:23
  from "G:\XAMPP\htdocs\Escape\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_682b7f4f637035_82749976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9054d67ccbf60dc7b37caff5a0ab970685e45024' => 
    array (
      0 => 'G:\\XAMPP\\htdocs\\Escape\\app\\views\\templates\\main.tpl',
      1 => 1747681102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682b7f4f637035_82749976 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
	<head>
		<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Escapists MR" : $tmp);?>
</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/css/main.css" />
		
	</head>
	<body class="is-preload">
	<!-- Login -->
		<div id="login">
			<section>
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1295573560682b7f4f632a88_25051299', 'logging');
?>

			</section>
		</div>

	<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/images/logo.jpg" alt="logo" /></span>
							<h1 id="title">Escapists</h1>
							<h2>Escape Room'y</h2>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link"><span class="icon solid fa-home">Menu</span></a></li>
								<li><a href="#about" id="about-link"><span class="icon solid fa-user">O Nas</span></a></li>
								<li><a href="#pokoje" id="pokoje-link"><span class="icon solid fa-th">Pokoje</span></a></li>
								<li><a href="#contact" id="contact-link"><span class="icon solid fa-envelope">Kontakt</span></a></li>
							</ul>
						</nav>

						<nav id="nav">
							<ul>
								<li><?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout"><span class="icon solid fa-user-lock">Wyloguj</span</a>
								<?php } else { ?>	
									<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow"><span class="icon solid fa-lock">Zaloguj</span></a>
								<?php }?></li>
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

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Witamy na stronie <strong>Escapists</strong><br> sieci pokojów typu Escape Room</h2>
								<p>Oferujemy najnowocześniejsze i najbardziej różnorodne atrakcje dla każdego!</p>
							</header>

							<footer>
								<a href="#about" class="button scrolly">O nas</a>
							</footer>

						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>O nas</h2>
							</header>

							<a href="#" class="image featured"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/images/pic08.jpg" alt="" /></a>

							<p>Jeśteśmy na rynku od 2007 roku i przynosimy dla was z pasją dziesiątki placówek z najróżniejszymi <strong>Escape Room'ami</strong> od lat.
							 Współpracujemy z dużymi firmami przez co mamy możliwość robienia tematycznych pokoi z pop kultury takie jak <strong>Star Wars, Warhammer 40k, Indiana Jones</strong> i inne!</p>

						</div>
					</section>


				<section id="pokoje">
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1111838881682b7f4f635b50_34214173', 'content');
?>

				</section>


				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<header>
								<h2>Kontakt</h2>
							</header>

							<p>W celu zorganizowania większej imprezy grupowej lub wynajęcia dużej ilośći pokoi możesz skontaktować się z nami poprzez Email. 
							Jeżeli masz jakieś wątpliwości co do jakości naszych usług nie zwlekaj i do nas napisz a postaramy ci się jak najlepiej pomóc!</p>

							<form method="post" action="#">
								<div class="row">
									<div class="col-6 col-12-mobile"><input type="text" name="name" placeholder="Imię" /></div>
									<div class="col-6 col-12-mobile"><input type="text" name="email" placeholder="Email" /></div>
									<div class="col-12">
										<textarea name="message" placeholder="Wiadomość"></textarea>
									</div>
									<div class="col-12">
										<input type="submit" value="Wyślij Wiadomość" />
									</div>
								</div>
							</form>

						</div>
						<br>
					</section>
			
			</div>


		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li><li>Mateusz Rzymowski</li>
					</ul>

			</div>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->asset_path;?>
/js/main.js"><?php echo '</script'; ?>
>

	</body>
</html><?php }
/* {block 'logging'} */
class Block_1295573560682b7f4f632a88_25051299 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'logging'} */
/* {block 'content'} */
class Block_1111838881682b7f4f635b50_34214173 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'content'} */
}
