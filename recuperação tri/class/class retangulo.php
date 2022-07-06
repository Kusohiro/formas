<?php 
require_once("class forma.php");
class retangulo extends Forma{
	private $base;
	private $altura;
	private static $nome = 0;
	
	public function __construct($id, $cor, $tabuleiro, $base, $altura){
		parent::__construct($id,$cor,$tabuleiro);
		$this->setbase($base);
		$this->setaltura($altura);
	}
	public function getbase(){ return $this->base; }
	public function setbase($base){ if (strlen($base) > 0)$this->base = $base; }
	public function getaltura(){ return $this->altura; }
	public function setaltura($altura){ if (strlen($altura) > 0)$this->altura = $altura; }
	
	public function __toString(){
		$str = parent::__toString();
		$str .= ", base: ".$this->getbase();
		$str .= ", altura: ".$this->getaltura();
		$str .= ", perimetro: ".$this->calculaPerimetro();
		$str .= ", area: ".$this->calculaArea();
		return $str;
	}
	
	public function desenha(){
			$desenho = "<style>
	div.quad {
 width: ". $this->getbase() ."px;
 height: ". $this->getaltura() ."px;
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
		$query = "INSERT INTO retangulo (base, altura, cor, RidTab) VALUES (:base, :altura, :cor, :RidTab)";
	 		$parametros = array(":base"=>$this->getbase(),
								":altura"=>$this->getaltura(),
								":cor"=>$this->getcor(),
								":RidTab"=>$this->getTabuleiro() );
		return parent::executar($query, $parametros);
	}
	
	public function editar(){
		$query = "UPDATE retangulo
                    SET base = :base,
					altura = :altura,
					cor = :cor,
					RidTab = :RidTab
                    WHERE idRet = :id";
	 		$parametros = array(":base"=>$this->getbase(),
								":altura"=>$this->getaltura(),
								":cor"=>$this->getcor(),
								":RidTab"=>$this->getTabuleiro(),
							    ":id"=>$this->getid() );
		return parent::executar($query, $parametros);
	}
	
	public function excluir(){
            $query = "DELETE FROM retangulo WHERE idRet = :id";
			$parametros = array(":id"=>$this->getid() );
		return parent::executar($query, $parametros);
        }
	public function buscar(){
            $query = "SELECT * FROM retangulo WHERE idRet = :id";
          $parametros = array(":id"=>$this->getid() );
		return parent::busca($query, $parametros);
        }
	
	public function calculaArea(){
		$area = $this->getbase() * $this->getaltura();
		return $area;
	}
	
	public function calculaPerimetro(){
		return ($this->getbase() * 2) + ($this->getaltura() * 2); 
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
$retangulo2 = new retangulo(1, '#deadff', 1, 100);
echo $retangulo2;
$joaquim=$retangulo2->desenha();
echo "<br><br>". $joaquim ."<br>";
	
$retangulo1 = new retangulo(2, '#ff0000', 1, 50);
echo $retangulo1;
$joaquim1=$retangulo1->desenha();
echo "<br><br>". $joaquim1 ."<br>";*/
?>	
