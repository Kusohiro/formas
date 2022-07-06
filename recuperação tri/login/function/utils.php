<?php
	require_once("../class/class usuario.php");
    require_once("../../../class/class quadrado.php");
	require_once("../../../class/class tabuleiro.php");

    function exibir_como_select($key, $dados){
        $str = "<option value=0>Escolha</option>";
        foreach($dados as $linha){
            $str .= "<option value='{$linha[$key[0]]}'>id: {$linha[$key[0]]}; lado:{$linha[$key[1]]}</option>";
        }
        return $str;
    }
  function lista_quadrado($id){
		 $quadrado = new quadrado("", "", "", "");
        $lista = $quadrado->buscar($id);
        foreach($lista as $dados)
            return $dados;}

	 function lista_tabuleiro($id){
		 $tabuleiro = new tabuleiro("", "");
        $lista = $tabuleiro->buscar($id);
        foreach($lista as $dados)
            return $dados;}

	function lista_usuario($id){
		 $usuario = new usuario("", "", "", "");
        $lista = $usuario->buscar($id);
        foreach($lista as $dados)
            return $dados;}

 function select_quadrado(){
        $quadrado = new quadrado("", "", "", "");
        $lista = $quadrado->buscarTabuleiro();
        return exibir_como_select(array("idTab", "lado"), $lista);
    }
?>