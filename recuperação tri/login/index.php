<!doctype html>
<?php 
	$impostor = isset($_GET["impostor"]) ? $_GET["impostor"] : "";
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<link rel="stylesheet" href="style.css">
	
<script src="script1.js" defer></script>
	  
<title>Login Quadrados</title>
</head>

<body>
	
	<main>
		<section class="login">
			<div class="wrapper">
			<img src="images/logo.png.png" class="login_logo">
			
			<h1 class="login_title">Fazer login</h1>
			
			<label class="login_label">
				<span>nome de usuario</span>
				<input type="text" name="usuario" class="input" id="usuario">
			</label>
			
			<label class="login_label">
				<span>senha</span>
				<input type="password" name="senha" class="input" id="senha">
			</label>
			
			<div class="login_icons">
				<button type="button" class="icons_button">
					<img src="images/placeholder.png" alt="placeholder">
				</button>
				
				<button type="button" class="icons_button">
					<img src="images/placeholder.png" alt="placeholder">
				</button>
				
				<button type="button" class="icons_button">
					<img src="images/placeholder.png" alt="placeholder">
				</button>
			</div>
			
			<label class="login_label--checkbox">
				<input type="checkbox" class="input--checkbox">
				Manter login
			</label>
			<?php if($impostor == "true") echo "algum dado foi inserido errado"?>
			</div>
			
			<div class="wrapper">
			<a id="logar">
			<button type="button" class="login_button" disabled>
				<img src="images/seta.png" alt="confirmalogin">
			</button>
				</a>
			
			<a href="function/cad/cad_usuario.php" class="login_link">não consegue iniciar sessão?</a>
			<a href="criar conta.php" class="login_link">criar conta</a>
			</div>
		</section>
		
		<section class="wallpaper">
			
		</section>
	</main>
</body>
</html>