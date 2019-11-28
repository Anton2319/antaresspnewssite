<?php
$db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
function countdb($db) {
    $responce = mysqli_query($db, "SELECT COUNT(1) FROM `articles`");
    $result = mysqli_fetch_array($responce);
    return $result[0];
}
function getfromdb($db, $id) {
    $responce = mysqli_query($db, "SELECT * FROM `articles` WHERE id = ".$id);
    $result = mysqli_fetch_assoc($responce);
    return $result;
}
$dblenght = countdb($db);
$article1 = getfromdb($db, $dblenght);
$article2 = getfromdb($db, $dblenght - 1);
$article3 = getfromdb($db, $dblenght - 2);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Antares Space News</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link rel="stylesheet" href="style.css">
	<style>
	body {
		background-image: url("bg.png") ;
		background-position: center center;
		background-attachment: fixed;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #131313;">
		<a class="navbar-brand" href="/">
			<img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			<b>Antares Space News</b>
		</a>
		<div class="navbar navbar-expand-lg " id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../index.php">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Статьи<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Форум</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- РАЗДЕЛ СТАТЕЙ -->
	<div class="container">
		<div class="row">
      <div class="article">
				<div class="container">
					<div class="row">
						<div class="col-4">
							<img src="test.jpg" width="100%" class="d-inline-block align-top article-img" alt="">
						</div>
						<div class="col-8">
							<h2 class="article-heading">
							    <?php echo($article1['Header']);
            					if($article1['Header'] == null) {
            					    echo("Невозможно найти данную статью");
            					}
            					?>
							</h2>
							<p class="article-text">
							    <?php echo($article1['Introtext']);
            					if($article1['Introtext'] == null) {
            					    echo("Невозможно найти данную статью");
            					}
            					?>
							</p>
							<a class="btn btn-primary article-btn" href=<?php echo("/article?id=".$dblenght); ?>>Читать далее</a>
						</div>
                    </div>
				</div>
			</div>
	  </div>
      <div class="row">
        <div class="article">
  				<div class="container">
  					<div class="row">
  						<div class="col-4">
  							<img src="test.jpg" width="100%" class="d-inline-block align-top article-img" alt="">
  						</div>
  						<div class="col-8">
  							<h2 class="article-heading">
  							    <?php echo($article2['Header']);
            					if($article2['Header'] == null) {
            					    echo("Невозможно найти данную статью");
            					}
            					?>
  							</h2>
  							<p class="article-text">
  							    <?php echo($article2['Introtext']);
            					if($article2['Introtext'] == null) {
            					    echo("Невозможно найти данную статью");
            					}
            					?>
  							</p>
  							<a class="btn btn-primary article-btn" href=<?php echo("/article?id=".$dblenght); ?>>Читать далее</a>
  						</div>
              </div>
  					</div>
  				</div>
  			</div>
		</div>
	<br>
	<br>
	<br>
	<footer class="section" style="background-color: #131313;">
		<div class="container">
      <div class="row">
        <div class="col-1">
					<br>
          <a class="brand" href="index.html">
						<img class="brand-logo-light" src="logo.png" alt="" width="30" height="30">
					</a>
				</div>
				<div class="col-8">
					<br>
	        <p style="color: white;">© Antares Space News 2019. Вся информация размещённая здесь взята из открытых источников.
					Копирование материалов разрешено с указанием ссылки на него. Обратная связь: anton_2319@outlook.com
					</p>
				</div>
        </div>
      </div>
			</div>
	</footer>
</body>
</html>
