<?php
    require_once("../class/class usuario.php");
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        $usuario = new usuario("", "", "", "");
        $usuario->excluir($id);
        header("location:../cad/cad_usuario.php");
	}

    if($acao == "salvar"){
        $nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
        $usuario = isset($_GET["usuario"]) ? $_GET["usuario"] : "";
		$senha = isset($_GET["senha"]) ? $_GET["senha"] : "";
		
        $usuario = new usuario($id, $nome, $usuario, $senha);
		//var_dump($usuario);
        if($id == 0){
            $usuario->insere();
			//echo $id;
            header("location:../../index.php");
        } else{
            $usuario->editar($id);
            header("location:../../index.php");
        }
		
    }
	if($acao == "logar"){
        $nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
        $login = isset($_GET["usuario"]) ? $_GET["usuario"] : "";
		$senha = isset($_GET["senha"]) ? $_GET["senha"] : "";
		
        $usuario = new usuario($id, $nome, $login, $senha);
		$errou = $usuario->efetuarLogin($login, $senha);
		if($errou != ""){
			//echo $errou;
			header("location:../../../cad/cad_tabuleiro.php?nome=$errou");
		} else { //echo "impostor";}
			header("location:../../index.php?impostor=true");
		}
	}
?>