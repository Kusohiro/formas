<?php 
class database {

static function iniciaConexao(){
	require_once("../conf/Conexao.php");
	 return Conexao::getInstance();
}

	static function vincularParamentros($stmt	, $parametros=array()){
			 		foreach($parametros as $key=>$valor) {
	 		$stmt->bindValue($key, $valor);
					}
		return $stmt;
	}

 static function executar($query, $parametros=array()){
            $conexao = self::iniciaConexao();
            $stmt = $conexao->prepare($query);
			$stmt = self::vincularParamentros($stmt, $parametros);
            return $stmt->execute();
        }
	 public static function busca($sql, $parametros = array()){
            $conexao = self::iniciaConexao();
            $comando = $conexao->prepare($sql);
            $comando = self::vincularParamentros($comando, $parametros);
            $comando->execute();
            return $comando->fetchAll();
        }
}
?>