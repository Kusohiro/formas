<?php 

class tabuleiro {
	private $idTab;
	private $lado;
	
	 public function __construct($idTab, $lado){
            $this->setlado($lado);
            $this->setidTab($idTab);
        }
	public function __toString(){
		$str = "idTab: ".$this->getidTab() ."<br> lado: ".$this->getlado() ."<br> area: ".$this->area()." <br> perimetro: ".$this->perimetro()." <br> diagonal: ".$this->diagonal();
		return $str;
	}
	 public function getlado(){ return $this->lado; }
        public function getidTab(){ return $this->idTab; }
		
        public function setlado($lado){ if ($lado > 0)$this->lado = $lado; }
        public function setidTab($idTab){ if (strlen($idTab) > 0)$this->idTab = $idTab; }
	
	public function area(){
		return $this->lado * $this->lado;
	}
	public function perimetro(){
		return $this->lado * 4;

	}
	public function diagonal(){
		$lado2 = $this->lado * $this->lado;
		$diagonal2 = $lado2 + $lado2;
		return sqrt($diagonal2);
	}
 static function insere($idTab, $lado){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO tabuleiro (lado, idTab) VALUES (:lado, :idTab)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":lado", $lado);
            $stmt->bindParam(":idTab", $idTab);
            return $stmt->execute();
        }
        static function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM tabuleiro WHERE idTab = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        static function editar($id, $lado){
            require_once("../conf/Conexao.php");
            $query = "UPDATE tabuleiro
                    SET lado = :lado
                    WHERE idTab = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":lado", $lado);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        static function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM tabuleiro WHERE idTab = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
		public function desenha(){
			$desenho = "<style>
	div.quad {
 width: ". $this->getlado() ."px;
 height: ". $this->getlado() ."px;
 background-color:".$this->getidTab() .";
 		border-style: solid;
		border-width: 1px;
		border-color: #000;
 }


</style>

<div class='quad'></div>";
	return $desenho;		
		}
    }
?>
