<?Php
require_once("class circulo.php");
class esfera extends circulo{
	private $raio;
	private static $nome = 0;
	
	public function __construct($id, $cor, $tabuleiro, $raio){
		parent::__construct($id,$cor,$tabuleiro, $raio);
		$this->setRaio($raio);
	}
	
		public function getraio(){ return $this->raio; }
	public function setraio($raio){ if (strlen($raio) > 0)$this->raio = $raio; }
	
	public function __toString(){
		$str = parent::__toString();
		return $str;
	}
	
	public function desenha(){
		$tamanho = $this->getraio() * 2 + 20;
		$desenho =
  "<style> div.circ {width: ".$tamanho."px;
    height: ".$tamanho."px;
    line-height: ".$tamanho."px;
    text-align: center;
    color: ".parent::getcor().";
    margin: 100px auto;
    /* The magic are those 2 lines: */
    border-radius: 100%;
    box-shadow: inset 0 0 80px ".parent::getcor().";
	</style>

<div class='circ'></div>
";
		self::$nome++;
		return $desenho;
	}
	
	public function insere(){
		$query = "INSERT INTO esfera (raio, cor, TabE) VALUES (:raio, :cor, :Tab)";
	 		$parametros = array(":raio"=>$this->getraio(),
								":cor"=>$this->getcor(),
								":Tab"=>$this->getTabuleiro() );
		return parent::executar($query, $parametros);
	}
	
	public function editar(){
		$query = "UPDATE esfera
                    SET raio = :raio,
					cor = :cor,
					TabE = :Tab
                    WHERE idCirc = :id";
	 		$parametros = array(":raio"=>$this->getraio(),
								":cor"=>$this->getcor(),
								":Tab"=>$this->getTabuleiro(),
							    ":id"=>$this->getid() );
		return parent::executar($query, $parametros);
	}
	
	public function excluir(){
            $query = "DELETE FROM esfera WHERE idCirc = :id";
			$parametros = array(":id"=>$this->getid() );
		return parent::executar($query, $parametros);
        }
	public function buscar(){
            $query = "SELECT * FROM esfera WHERE idCirc = :id";
          $parametros = array(":id"=>$this->getid() );
		return parent::executar($query, $parametros);
        }
	
	public function calculaArea(){
		$area = 4 * (pi() * ($this->raio * $this->raio));
		return $area;
	}

}

/*
$bola = new esfera(1, '#deadff', 1, 100);
echo $bola;
$joaquim=$bola->desenha();
echo "<br><br>". $joaquim ."<br>";
	
/*$esfera1 = new esfera(2, '#2eff89', 1, 50);
echo $esfera1;
$paulo=$esfera1->desenha();
echo "<br><br>". $paulo ."<br>";*/
?>