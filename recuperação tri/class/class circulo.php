<?php 
require_once("class forma.php");
class circulo extends Forma{
	private $raio;
	private static $nome = 0;
	
	public function __construct($id, $cor, $tabuleiro, $raio){
		parent::__construct($id,$cor,$tabuleiro);
		$this->setRaio($raio);
	}
	public function getraio(){ return $this->raio; }
	public function setraio($raio){ if (strlen($raio) > 0)$this->raio = $raio; }
	
	public function __toString(){
		$str = parent::__toString();
		$str .= ", raio: ".$this->getraio();
		$str .= ", area: ".$this->calculaArea();
		return $str;
	}
	
	public function desenha(){
		$tamanho = $this->getraio() * 2 + 20;
		$centro = $tamanho / 2;
		$desenho =
  "<canvas id='".self::$nome."' width='$tamanho' height='$tamanho'></canvas>
   <script>
      // Canvas e contexto
      var canvas = document.getElementById('".self::$nome."');
      var context = canvas.getContext('2d');
	    context.lineWidth = 2;
      context.strokeStyle = 'black';
	  context.fillStyle = '".parent::getcor()."';
       // Circunferência completa
      context.beginPath();
      context.arc($centro, $centro, ".$this->getraio().", 0, 2*Math.PI);
      context.fill();
      context.stroke();
	  </script>";
		self::$nome++;
		return $desenho;
	}
	
	public function insere(){
		$query = "INSERT INTO circulo (raio, cor, Tab) VALUES (:raio, :cor, :Tab)";
	 		$parametros = array(":raio"=>$this->getraio(),
								":cor"=>$this->getcor(),
								":Tab"=>$this->getTabuleiro() );
		return parent::executar($query, $parametros);
	}
	
	public function editar(){
		$query = "UPDATE circulo
                    SET raio = :raio,
					cor = :cor,
					Tab = :Tab
                    WHERE idCirc = :id";
	 		$parametros = array(":raio"=>$this->getraio(),
								":cor"=>$this->getcor(),
								":Tab"=>$this->getTabuleiro(),
							    ":id"=>$this->getid() );
		return parent::executar($query, $parametros);
	}
	
	public function excluir(){
            $query = "DELETE FROM circulo WHERE idCirc = :id";
			$parametros = array(":id"=>$this->getid() );
		return parent::executar($query, $parametros);
        }
	public function buscar(){
            $query = "SELECT * FROM circulo WHERE idCirc = :id";
          $parametros = array(":id"=>$this->getid() );
		return parent::executar($query, $parametros);
        }
	
	public function calculaArea(){
		$area = pi() * ($this->raio * $this->raio);
		return $area;
	}
}
/*
$circulo2 = new circulo(1, '#deadff', 1, 100);
echo $circulo2;
$joaquim=$circulo2->desenha();
echo "<br><br>". $joaquim ."<br>";
	
$circulo1 = new circulo(2, '#ff0000', 1, 50);
echo $circulo1;
$joaquim1=$circulo1->desenha();
echo "<br><br>". $joaquim1 ."<br>";*/
?>	
