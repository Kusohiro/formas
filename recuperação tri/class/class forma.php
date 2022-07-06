<?php 
require_once("class Databased.php");
abstract class Forma extends database{
	private $id;
	private $cor;
	private $Tabuleiro;
	private static $contador = 0;
	
	 public function __construct($id, $cor, $Tabuleiro){
            $this->setcor($cor);
		 $this->setid($id);
		 $this->setTabuleiro($Tabuleiro);
		 self::$contador = self::$contador+1;
        }
        public function getcor(){ return $this->cor; }
	public function getid(){ return $this->id; }
	public function getTabuleiro(){ return $this->Tabuleiro; }
		
        public function setcor($cor){ if (strlen($cor) > 0)$this->cor = $cor; }
	public function setid($id){ if ($id > 0)$this->id = $id; }
	public function setTabuleiro($Tabuleiro){ if ($Tabuleiro > 0)$this->Tabuleiro = $Tabuleiro; }
	
	public function __toString(){
		$str = "id: ".$this->getid(). ", cor: ".$this->getcor(). ", Tabuleiro: ". $this->getTabuleiro();
		return $str;
	}
	static function buscarTabuleiro(){
            $query = "SELECT * FROM tabuleiro";
		$parametros = array();
		return parent::executar($query, $parametros);
        }
	
	public abstract function desenha();
	public abstract function calculaArea();
	public abstract function insere();
	public abstract function editar();
	public abstract function excluir();
	public abstract function buscar();
}
?>