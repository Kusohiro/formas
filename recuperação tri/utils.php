<?php

    require_once("class/class quadrado.php");
require_once("class/class tabuleiro.php");
require_once("class/class circulo.php");
require_once("class/class esfera.php");
require_once("class/class cubo.php");
require_once("class/class retangulo.php");
require_once("class/class triangulo.php");

    function exibir_como_select($key, $dados, $edit){
        $str = "<option value=0>Escolha</option>";
		$select = "";
        foreach($dados as $linha){
		if ($edit > 0 && $edit == $linha[$key[0]]){ $select = "selected";}
            $str .= "<option $select value='{$linha[$key[0]]}'>id: {$linha[$key[0]]}; lado:{$linha[$key[1]]}</option>";
			$select = "";
        }
        return $str;
    }
  function lista_quadrado($id){
		 $quadrado = new quadrado($id, "", "", "");
        $lista = $quadrado->buscar();
        foreach($lista as $dados)
            return $dados;}

function lista_retangulo($id){
		 $retangulo = new retangulo($id, "", "", "", "", "");
        $lista = $retangulo->buscar();
        foreach($lista as $dados)
            return $dados;}

function lista_triangulo($id){
		 $triangulo = new triangulo($id, "", "", "", "", "", "");
        $lista = $triangulo->buscar();
        foreach($lista as $dados)
            return $dados;}

	 function lista_tabuleiro($id){
		 $tabuleiro = new tabuleiro("", "");
        $lista = $tabuleiro->buscar($id);
        foreach($lista as $dados)
            return $dados;}

	function lista_circulo($id){
		 $circulo = new circulo($id, "", "", "");
        $lista = $circulo->buscar();
        foreach($lista as $dados)
            return $dados;}
function lista_esfera($id){
		 $esfera = new esfera($id, "", "", "");
        $lista = $esfera->buscar();
        foreach($lista as $dados)
            return $dados;}
function lista_cubo($id){
		 $cubo = new cubo($id, "", "", "");
        $lista = $cubo->buscar();
        foreach($lista as $dados)
            return $dados;}

 function select_quadrado($edit){
        $quadrado = new quadrado("", "", "", "");
        $lista = $quadrado->buscarTabuleiro();
        return exibir_como_select(array("idTab", "lado"), $lista, $edit);
    }
?>