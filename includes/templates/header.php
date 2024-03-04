<?php
$permit = 20;
$header = [
	[
		'title' => 'Inicio',
		'actual_key' => 'home',
		'minPermit' => 0,
		'onlyPermit' => false,
		'href' => '/',
	],
];

$home = false;

foreach ($header as $navItems) {
	if ($actual == $navItems['actual_key']) {
		$title = $navItems['title'];
	}
}

header('Content-Type: text/html');
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pinarsoft MVC PHP <?php echo $title ?? '' ?> </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="shortcut icon" href="/image?image=logo-min.jpeg" type="image/x-icon">
</head>

<body>
	<header <?php echo $home ? 'class="navbar-home"' : '' ?>>
		<nav class="navbar nav navbar-expand-lg">
			<div class="container-fluid text-light">
				<a class="navbar-brand" href="/">
					<img class="brand-logo" style="width: 3rem;" src="/image?image=pinarlogo.png" alt="brand-logo">Pinarsoft</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<?php
						foreach ($header as $navItems) {
							$bool = false;
							if ($navItems['onlyPermit'] == true && $navItems['minPermit'] == $permit) {
								$bool = true;
							} else {
								if ($permit >= $navItems['minPermit'] && !$navItems['onlyPermit']) {
									$bool = true;
								}
							}

							if ($bool) :
						?>
								<li class="nav-item">
									<a class="nav-link <?php
										echo $actual == $navItems['actual_key'] ? 'active' : '' ?>" href="<?php echo $navItems['href'] ?>">
										<?php echo $navItems['title'] ?>
									</a>
								</li>
						<?php
							endif;
						}
						?>
					</ul>
					<span class="navbar-text">
						Miniframework de php
					</span>
				</div>
			</div>
		</nav>

	</header>