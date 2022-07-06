<!doctype html>
<html><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="Super Form Reset.css">
	
<script src="script.js" defer></script> 
<title>criar conta</title>
</head>

<body>
	
	<main>
		<section class="login">
			<div class="wrapper">
			<img src="images/logo.png.png" class="login_logo">
			
			<h1 class="login_title">criar conta</h1>
			
			<label class="login_label">
				<span>nome</span>
				<input type="text" name="nome" class="input" id="nome">
			</label>
				
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
				
				<button type="submit" name="acao" value="salvar" class="icons_button">
					<img src="images/placeholder.png" alt="placeholder">
				</button>
			</div>
			</div>
			<div class="wrapper">
				<a id="link">
			<button type="button" class="login_button" disabled>
				<img src="images/seta.png" alt="confirmalogin">
			</button>
				</a>
			<a href="function/cad/cad_usuario.php" class="login_link">não consegue iniciar sessão?</a>
			<a href="index.php" class="login_link">fazer login</a>
			</div>
		</section>
		
		<section class="wallpaper">
			
		</section>
	</main>
</body>
</html>