<!doctype html>
<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
	require_once "../utils.php";
		
	$Tab = isset($_GET["Tab"]) ? $_GET["Tab"] : 0;
	$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idCirc = isset($_GET["idCirc"]) ? $_GET["idCirc"] : 0;
    if($idCirc > 0){
        $vetor = lista_circulo($idCirc);
    }
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 2;
    $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>tabela circulo</title>
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
    <nav> <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><?php echo $nome?></a>
	  <a href="../login/index.php">SAIR</a></nav>
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
      <h1><!-- Blog title -->circulo</h1>
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
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>idCirc<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>raio<br>
	<input type="radio" name="tipo" id="tipo" value="3" <?php if ($tipo == 3) { echo "checked"; }?>>cor<br>	
	<input type="radio" name="tipo" id="tipo" value="4" <?php if ($tipo == 4) { echo "checked"; }?>>Tab<br>	
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar">
</form>
      	<table border="1" id="pao">
    <tr id="trcss">
        <th>idCirc</th>
        <th>raio</th>
        <th>cor</th>
		<th>Tab</th>
		<th>Detalhes</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
			
			$sql = "SELECT * FROM circulo";
    if ($tipo == 1){
        $sql .= " WHERE idCirc like '$procurar' ORDER BY idCirc";
    }else if($tipo == 2){    
        $sql .= " WHERE raio LIKE '$procurar%' ORDER BY raio";
    }else if($tipo == 3) {
		$sql .= " WHERE cor LIKE '%$procurar%' ORDER BY cor";
	}else
		$sql .= " WHERE Tab LIKE '$procurar' ORDER BY Tab";
	
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query($sql);
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
			$Cor = str_replace('#','%23',$linha["cor"])
    ?>
    <tr id="trcss2">
        <td><?php echo $linha["idCirc"]; ?></td>
        <td><?php echo $linha["raio"]; ?></td>
        <td><?php echo $linha["cor"]; ?></td>
		<td><?php echo $linha["Tab"]; ?></td>
		<td><a href="../indexcirculo.php?idCirc=<?php echo $linha['idCirc'];?>&raio=<?php echo $linha['raio'];?>&cor=<?php echo $Cor;?>&Tab=<?php echo $linha['Tab'];?>&nome=<?php echo $nome?>">detalhes</a></td>
        <td><a href="cad_circulo.php?acao=editar&idCirc=<?php echo $linha['idCirc'];?>&Tab=<?php echo $linha['Tab'];?>&nome=<?php echo $nome?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('../ctrl/ctrl_circulo.php?acao=excluir&idCirc=<?php echo $linha['idCirc']; ?>&nome=<?php echo $nome?>')">Excluir</a><br></td>
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
      <form action="../ctrl/ctrl_circulo.php?idCirc=<?php echo $idCirc; ?>&nome=<?php echo $nome; ?>" method="post">
        raio: <input type="text" name="raio" value="<?php if($acao == "editar") echo $vetor[1]; ?>"><br>
        <br>
        cor: <input type="color" name="cor" value="<?php if($acao == "editar") echo $vetor[2]; ?>"><br>
		Tab: <select name="Tab">
		  <?php
		  if($idCirc > 0){
			  echo select_quadrado($Tab);
		  }
          else echo select_quadrado(0);
                    ?>
		  </select><br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
		  <br><hr>
		   <div id="adimage"><img src="../BlogPostAssets/images/images (1).jpg" alt=""/></div>
		  <br> <br>
    </form>
		<?php include_once("../menu.html")?><br><br>
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