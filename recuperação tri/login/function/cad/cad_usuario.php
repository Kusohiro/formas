<!doctype html>
<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
	require_once "../utils.php";
		
		$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    if($id > 0){
        $vetor = lista_usuario($id);
    }
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 2;
    $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>tabela usuario</title>
<link href="../BlogPostAssets/styles/blogPostStyle.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
		<audio autoplay loop>
			<source  src="../audio.mpeg">
		</audio>
<div id="mainwrapper">
  <header> 
    <!--**************************************************************************
    Header starts here. It contains Logo and 3 navigation links. 
    ****************************************************************************-->
    <div id="logo"><img src="../BlogPostAssets/images/logoImage.png.png"logoImage.png"" alt="sample logo"><!-- Company Logo text --></div>
    <nav> <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">secreto</a></nav>
  </header>
  <div id="content">
    <div class="notOnDesktop"> 
      <!-- This search box is displayed only in mobile and tablet laouts and not in desktop layouts -->
      <input type="text" placeholder="Search">
    </div>
    <section id="mainContent"> 
      <!--************************************************************************
    Main Blog content starts here
    ****************************************************************************-->
      <h1><!-- Blog title -->usuario</h1>
      <div id="bannerImage"><img src="../BlogPostAssets/images/160e6a310003bee0545da7e36d27cfa8--anime-scenery-horror-film.jpg" alt=""/></div>
		<br>
		<style>
			#pao {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
			#trcss {
				background-color: #ADFFDC;
			}
				#trcss2:nth-child(odd) {
  background-color: #F37EFF;
}

#trcss2:nth-child(even) {
  background-color: #F557FF;
}
			}
			
			
		</style>
		<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>id<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>nome<br>
	<input type="radio" name="tipo" id="tipo" value="3" <?php if ($tipo == 3) { echo "checked"; }?>>usuario<br>
	<input type="radio" name="tipo" id="tipo" value="4" <?php if ($tipo == 4) { echo "checked"; }?>>senha<br>
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar">
</form>
      	<table border="1" id="pao">
    <tr id="trcss">
        <th>ID</th>
        <th>nome</th>
		<th>usuario</th>
		<th>senha</th>
		<th>Detalhes</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
			
			$sql = "SELECT * FROM usuario";
    if ($tipo == 1){
        $sql .= " WHERE idUser = $procurar ORDER BY idUser";
    }elseif ($tipo == 2){   
        $sql .= " WHERE nome LIKE '$procurar%' ORDER BY nome";
	}elseif ($tipo == 3){   
        $sql .= " WHERE login LIKE '$procurar%' ORDER BY login";
	}else{   
        $sql .= " WHERE senha LIKE '$procurar%' ORDER BY senha";
	}
			
	
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query($sql);
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
    ?>
    <tr id="trcss2">
        <td><?php echo $linha["idUser"]; ?></td>
        <td><?php echo $linha["nome"]; ?></td>
		<td><?php echo $linha["login"]; ?></td>
		<td><?php echo $linha["senha"]; ?></td>
		<td><a href="../indexusuario.php?idUser=<?php echo $linha['idUser'];?>&nome=<?php echo $linha['nome'];?>&usuario=<?php echo $linha['login'];?>&senha=<?php echo $linha['senha'];?>">detalhes</a></td>
        <td><a href="cad_usuario.php?acao=editar&id=<?php echo $linha['idUser'];?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('../ctrl/ctrl_usuario.php?acao=excluir&id=<?php echo $linha['idUser']; ?>')">Excluir</a><br></td>
    </tr>
    <?php 
        }
    ?>
</table>
      <aside id="authorInfo" align="center"> 
        <!-- The author information is contained here -->
        <h2>João Vitor Oliveira de Souza</h2>
      <img id="melodia" src="../BlogPostAssets/images/commission_by_jirafuru_de6glls-350t.png" width="633" height="350" alt=""/>
		<br><br></aside>
		<br>
    </section>
    <section id="sidebar"> 
      <!--************************************************************************
    Sidebar starts here. It contains a searchbox, sample ad image and 6 links
    ****************************************************************************-->
		<br>
      <form action="../ctrl/ctrl_usuario.php?" method="GET">
		<input type="hidden" name="id" value="<?php if($acao == "editar") echo $vetor[0]; ?>">
        nome: <input type="text" name="nome" value="<?php if($acao == "editar") echo $vetor[1]; ?>"><br>
        usuario: <input type="text" name="usuario" value="<?php if($acao == "editar") echo $vetor[2]; ?>"><br>
		senha: <input type="password" name="senha" value="<?php if($acao == "editar") echo $vetor[3]; ?>"><br>
		<br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
		  <br><hr>
		   <div id="adimage"><img src="../BlogPostAssets/images/images (1).jpg" alt=""/></div>
		  <br><br>
    </form>
		<a href="../../../cad/cad_quadrado.php">tabela quadrado </a>
		<br><br>
		<a href="../../../cad/cad_tabuleiro.php">tabela tabuleiro </a>
		<br><br><br><br>
    </section>
  </div>
  <div id="footerbar"><!-- Small footerbar at the bottom --></div>
</div>
</body>
</html>
<script>
    function excluirRegistro(url){
        if(confirm("Este registro será excluído. Tem certeza?"))
            location.href = url;
    }
</script>