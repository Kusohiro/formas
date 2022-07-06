<?php 
require_once("class forma.php");
class quadrado extends Forma{
	private $lado;
	private static $nome = 0;
	
	public function __construct($id, $cor, $tabuleiro, $lado){
		parent::__construct($id,$cor,$tabuleiro);
		$this->setlado($lado);
	}
	public function getlado(){ return $this->lado; }
	public function setlado($lado){ if (strlen($lado) > 0)$this->lado = $lado; }
	
	public function __toString(){
		$str = parent::__toString();
		$str .= ", lado: ".$this->getlado();
		$str .= ", perimetro: ".$this->calculaPerimetro();
		$str .= ", area: ".$this->calculaArea();
		return $str;
	}
	
	public function desenha(){
			$desenho = "<style>
	div.quad {
 width: ". $this->getlado() ."px;
 height: ". $this->getlado() ."px;
 background-color:".parent::getcor().";
 		border-style: solid;
		border-width: 1px;
		border-color: #000;
 }


</style>

<div class='quad'></div>";
	return $desenho;		
		}
	
	public function insere(){
		$query = "INSERT INTO quadrado (lado, cor, QidTab) VALUES (:lado, :cor, :QidTab)";
	 		$parametros = array(":lado"=>$this->getlado(),
								":cor"=>$this->getcor(),
								":QidTab"=>$this->getTabuleiro() );
		return parent::executar($query, $parametros);
	}
	
	public function editar(){
		$query = "UPDATE quadrado
                    SET lado = :lado,
					cor = :cor,
					QidTab = :QidTab
                    WHERE idQuad = :id";
	 		$parametros = array(":lado"=>$this->getlado(),
								":cor"=>$this->getcor(),
								":QidTab"=>$this->getTabuleiro(),
							    ":id"=>$this->getid() );
		return parent::executar($query, $parametros);
	}
	
	public function excluir(){
            $query = "DELETE FROM quadrado WHERE idQuad = :id";
			$parametros = array(":id"=>$this->getid() );
		return parent::executar($query, $parametros);
        }
	public function buscar(){
            $query = "SELECT * FROM quadrado WHERE idQuad = :id";
          $parametros = array(":id"=>$this->getid() );
		return parent::busca($query, $parametros);
        }
	
	public function calculaArea(){
		$area = $this->getlado() * $this->getlado();
		return $area;
	}
	
	public function calculaPerimetro(){
		return $this->getlado() * 4; 
	}
	static function buscarTabuleiro(){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM tabuleiro";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
}
/*
$quadrado2 = new quadrado(1, '#deadff', 1, 100);
echo $quadrado2;
$joaquim=$quadrado2->desenha();
echo "<br><br>". $joaquim ."<br>";
	
$quadrado1 = new quadrado(2, '#ff0000', 1, 50);
echo $quadrado1;
$joaquim1=$quadrado1->desenha();
echo "<br><br>". $joaquim1 ."<br>";*/
?>	
