<?Php
require_once("class quadrado.php");
class cubo extends quadrado{
	private $lado;
	private static $nome = 0;
	
	public function __construct($id, $cor, $tabuleiro, $lado){
		parent::__construct($id,$cor,$tabuleiro, $lado);
		$this->setlado($lado);
	}
	
		public function getlado(){ return $this->lado; }
	public function setlado($lado){ if (strlen($lado) > 0)$this->lado = $lado; }
	
	public function __toString(){
		$str = parent::__toString();
		$str .= ", volume: ".$this->calculaVolume();
		return $str;
	}
	
	public function desenha(){
		$translate = $this->getlado() / 2;
		$desenho ='<br><br><div class="scene">
  <div class="cube">
    <div class="cube__face cube__face--left"></div>
    <div class="cube__face cube__face--right"></div>
    <div class="cube__face cube__face--top"></div>
    <div class="cube__face cube__face--bottom"></div>
    <div class="cube__face cube__face--front"></div>
    <div class="cube__face cube__face--back"></div>
  </div>
</div><br><br>
<style>
.scene {
  width: 100%;
  height: 100%;
  perspective: 800px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.cube {
   position: relative;
   width: '. $this->getlado() .'px;
   height: '. $this->getlado() .'px;
   transform-style: preserve-3d;
   animation: rotation 10s infinite alternate;
}

@keyframes rotation {
  0% { transform: rotateY(0deg) rotateX(0deg); }
  100% { transform: rotateY(720deg) rotateX(60deg); }
}

.cube__face {
  position: absolute;
   width: '. $this->getlado() .'px;
   height: '. $this->getlado() .'px;
}

.cube__face--left {
background-color: '.parent::getcor().';
border-style: solid;
		border-width: 1px;
		border-color: #000;
  transform: translateX(-'.$translate.'px) rotateY(90deg);
}

.cube__face--right {
background-color: '.parent::getcor().';
border-style: solid;
		border-width: 1px;
		border-color: #000;
  transform: translateX('.$translate.'px) rotateY(90deg);
}

.cube__face--bottom {
background-color: '.parent::getcor().';
border-style: solid;
		border-width: 1px;
		border-color: #000;
  transform: translateY('.$translate.'px) rotateX(90deg);
}

.cube__face--top {
background-color: '.parent::getcor().';
border-style: solid;
		border-width: 1px;
		border-color: #000;
  transform: translateY(-'.$translate.'px) rotateX(90deg);
}

.cube__face--back {
background-color: '.parent::getcor().';
border-style: solid;
		border-width: 1px;
		border-color: #000;
  transform: translateZ(-'.$translate.'px);
}

.cube__face--front {
  background-color: '.parent::getcor().';
  border-style: solid;
		border-width: 1px;
		border-color: #000;
  transform: translateZ('.$translate.'px);
}

</style>';
		return $desenho;
	}
	
	public function insere(){
		$query = "INSERT INTO cubo (lado, cor, TabC) VALUES (:lado, :cor, :Tab)";
	 		$parametros = array(":lado"=>$this->getlado(),
								":cor"=>$this->getcor(),
								":Tab"=>$this->getTabuleiro() );
		return parent::executar($query, $parametros);
	}
	
	public function editar(){
		$query = "UPDATE cubo
                    SET lado = :lado,
					cor = :cor,
					TabC = :Tab
                    WHERE idCube = :id";
	 		$parametros = array(":lado"=>$this->getlado(),
								":cor"=>$this->getcor(),
								":Tab"=>$this->getTabuleiro(),
							    ":id"=>$this->getid() );
		return parent::executar($query, $parametros);
	}
	
	public function excluir(){
            $query = "DELETE FROM cubo WHERE idCube = :id";
			$parametros = array(":id"=>$this->getid() );
		return parent::executar($query, $parametros);
        }
	public function buscar(){
            $query = "SELECT * FROM cubo WHERE idCube = :id";
          $parametros = array(":id"=>$this->getid() );
		return parent::executar($query, $parametros);
        }
	
	public function calculaArea(){
		$area = 4 * ($area = $this->getlado() * $this->getlado());
		return $area;
	}
	public function calculaVolume(){
		$area = $this->getlado() * $this->getlado() * $this->getlado();
		return $area;
	}

}


/*$bola = new cubo(1, '#deadff', 1, 100);
echo $bola;
$joaquim=$bola->desenha();
echo "<br><br>". $joaquim ."<br>";
	
/*$cubo1 = new cubo(2, '#2eff89', 1, 50);
echo $cubo1;
$paulo=$cubo1->desenha();
echo "<br><br>". $paulo ."<br>";*/
?>