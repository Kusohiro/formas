<?php 
require_once("class forma.php");
class triangulo extends Forma{
	private $base;
	private $lado2;
	private $lado1;
	private static $nome = 0;
	
	public function __construct($id, $cor, $tabuleiro, $base, $lado2, $lado1){
		parent::__construct($id,$cor,$tabuleiro);
		$this->setbase($base);
		$this->setlado2($lado2);
		$this->setlado1($lado1);
	}
	public function getbase(){ return $this->base; }
	public function setbase($base){ if (strlen($base) > 0)$this->base = $base; }
	public function getlado2(){ return $this->lado2; }
	public function setlado2($lado2){ if (strlen($lado2) > 0)$this->lado2 = $lado2; }
	public function getlado1(){ return $this->lado1; }
	public function setlado1($lado1){ if (strlen($lado1) > 0)$this->lado1 = $lado1; }
	
	public function __toString(){
		$str = parent::__toString();
		$str .= ", base: ".$this->getbase();
		$str .= ", lado2: ".$this->getlado2();
		$str .= ", lado1: ".$this->getlado1();
		$str .= ", perimetro: ".$this->calculaPerimetro();
		$str .= ", area: ".$this->calculaArea();
		return $str;
	}
	
	public function desenha(){
			$str = "<div style='width: 0px; height: 0px; border-left: ".$this->base."px solid transparent; border-right: ".$this->lado2."px solid transparent;border-bottom: ".$this->lado1."px solid ".parent::getcor().";'></div><br>";
            return $str;		
		}
	
	public function insere(){
		$query = "INSERT INTO triangulo (base, lado2, lado1, cor, TidTab) VALUES (:base, :lado2, :lado1, :cor, :TidTab)";
	 		$parametros = array(":base"=>$this->getbase(),
								":lado2"=>$this->getlado2(),
								":lado1"=>$this->getlado1(),
								":cor"=>$this->getcor(),
								":TidTab"=>$this->getTabuleiro() );
		return parent::executar($query, $parametros);
	}
	
	public function editar(){
		$query = "UPDATE triangulo
                    SET base = :base,
					lado2 = :lado2,
					lado1 = :lado1,
					cor = :cor,
					TidTab = :TidTab
                    WHERE idTri = :id";
	 		$parametros = array(":base"=>$this->getbase(),
								":lado2"=>$this->getlado2(),
								":lado1"=>$this->getlado1(),
								":cor"=>$this->getcor(),
								":TidTab"=>$this->getTabuleiro(),
							    ":id"=>$this->getid() );
		return parent::executar($query, $parametros);
	}
	
	public function excluir(){
            $query = "DELETE FROM triangulo WHERE idTri = :id";
			$parametros = array(":id"=>$this->getid() );
		return parent::executar($query, $parametros);
        }
	public function buscar(){
            $query = "SELECT * FROM triangulo WHERE idTri = :id";
          $parametros = array(":id"=>$this->getid() );
		return parent::busca($query, $parametros);
        }
	
	public function calculaArea(){
		$area = sqrt(abs(($this->base+$this->lado2+$this->lado1)*(-$this->base+$this->lado2+$this->lado1)*($this->base-$this->lado2+$this->lado1)*($this->base+$this->lado2-$this->lado1)))/4;
		return strval($area);
	}
	
	public function calculaPerimetro(){
		return $this->base + $this->lado2 + $this->lado1;; 
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
$triangulo2 = new triangulo(1, '#000000', 1, 10, 10, 12);
echo $triangulo2;
$joaquim=$triangulo2->desenha();
echo "<br><br>". $joaquim ."<br>";	
/*
$triangulo1 = new triangulo(2, '#ff0000', 1, 50);
echo $triangulo1;
$joaquim1=$triangulo1->desenha();
echo "<br><br>". $joaquim1 ."<br>";*/
?>	
