<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
	<head>
		<title>{$page_title|default:"Escapists MR"}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{$conf->asset_path}/css/main.css" />
		
	</head>
	<body class="is-preload">
	<!-- Login -->
		<div id="login">
			<section>
				{block name=toptop}{/block}
			</section>
		</div>

	<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="{$conf->asset_path}/images/logo.jpg" alt="logo" /></span>
							<a href="{$conf->action_root}"><h1 id="title">Escapists</h1></a>
							<h2>Escape Room'y</h2>
						</div>

					<!-- Nav -->
						<nav id="nav">
							{if !isset($conf->roles.admin) && !isset($conf->roles.pracownik)}
							<ul>
								<li><a href="#top" id="top-link"><span class="icon solid fa-home">Menu</span></a></li>
								<li><a href="#about" id="about-link"><span class="icon solid fa-user">O Nas</span></a></li>
								<li><a href="#pokoje" id="pokoje-link"><span class="icon solid fa-th">Pokoje</span></a></li>
								<li><a href="#contact" id="contact-link"><span class="icon solid fa-envelope">Kontakt</span></a></li>
							</ul>
							{/if}
						</nav>

							<nav id="nav">
						<ul>
							<li>{if count($conf->roles)>0}
								<a href="{$conf->action_root}logout"><span class="icon solid fa-user-lock">Wyloguj</span></a>
							{else}	
								<a href="{$conf->action_root}loginShow"><span class="icon solid fa-lock">Zaloguj</span></a>
							{/if}</li>
							
							<li>{if isset($conf->roles.admin)}
								<a href="{$conf->action_root}adminPanel"><span class="icon solid fa-tv">Admin Panel</a></span>
							{/if}</li>

							<li>{if isset($conf->roles.pracownik)}
								<a href="{$conf->action_root}workerPanelEdit"><span class="icon solid fa-tv">Panel Pracownika</a></span>
							{/if}</li>
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
				{if !isset($conf->roles.admin) && !isset($conf->roles.pracownik)}
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

							<a href="#" class="image featured"><img src="{$conf->asset_path}/images/pic08.jpg" alt="" /></a>

							<p>Jeśteśmy na rynku od 2007 roku i przynosimy dla was z pasją dziesiątki placówek z najróżniejszymi <strong>Escape Room'ami</strong> od lat.
							 Współpracujemy z dużymi firmami przez co mamy możliwość robienia tematycznych pokoi z pop kultury takie jak <strong>Star Wars, Warhammer 40k, Indiana Jones</strong> i inne!</p>

						</div>
					</section>


				<section id="pokoje">
				{block name=content}{/block}
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
									{if empty($conf->roles)}
									<div class="col-6 col-12-mobile"><input type="text" name="name" placeholder="Imię" /></div>
									<div class="col-6 col-12-mobile"><input type="text" name="email" placeholder="Email" /></div>
									{/if}
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
				{/if}
			</div>


		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li><li>Mateusz Rzymowski</li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="{$conf->asset_path}/js/jquery.min.js"></script>
			<script src="{$conf->asset_path}/js/jquery.scrolly.min.js"></script>
			<script src="{$conf->asset_path}/js/jquery.scrollex.min.js"></script>
			<script src="{$conf->asset_path}/js/browser.min.js"></script>
			<script src="{$conf->asset_path}/js/breakpoints.min.js"></script>
			<script src="{$conf->asset_path}/js/util.js"></script>
			<script src="{$conf->asset_path}/js/main.js"></script>

	</body>
</html>