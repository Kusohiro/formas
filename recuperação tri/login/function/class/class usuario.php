<?php 

class usuario {
	private $idUser;
	private $nome;
	private $login;
	private $senha;
	
	 public function __construct($idUser, $nome, $login, $senha){
            $this->setnome($nome);
            $this->setidUser($idUser);
		 	$this->setlogin($login);
		 	$this->setsenha($senha);
        }
	public function __toString(){
		$str = "idUser: ".$this->getidUser() ."<br> nome: ".$this->getnome() ."<br> login: ".$this->getlogin()."<br> senha: ".$this->getsenha();
		return $str;
	}
	 public function getnome(){ return $this->nome; }
     public function getidUser(){ return $this->idUser; }
	 public function getlogin(){ return $this->login; }
	 public function getsenha(){ return $this->senha; }
		
     public function setnome($nome){ if ($nome > 0)$this->nome = $nome; }
     public function setidUser($idUser){ if (strlen($idUser) > 0)$this->idUser = $idUser; }
	 public function setlogin($login){ if (strlen($login) > 0)$this->login = $login; }
	 public function setsenha($senha){ if (strlen($senha) > 0)$this->senha = $senha; }

 public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO usuario (nome, idUser, login, senha) VALUES (:nome, :idUser, :login, :senha)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":idUser", $this->idUser);
	 		$stmt->bindParam(":login", $this->login);
			$stmt->bindParam(":senha", $this->senha);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM usuario WHERE idUser = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE usuario
                    SET nome = :nome, login = :login, senha = :senha
                    WHERE idUser = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":login", $this->login);
			$stmt->bindParam(":senha", $this->senha);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM usuario WHERE idUser = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
		public function efetuarLogin($login, $senha){
				require_once("../conf/Conexao.php");
            $query = "select nome, login, senha from usuario";
            $pdo = Conexao::getInstance();
        	$consulta = $pdo->query($query);
			while ($conta = $consulta->fetch(PDO::FETCH_BOTH)) {
				if($login == $conta["login"] && $senha == $conta["senha"]){
					//echo "login efetuado <br>";
					//echo $login . " / "; 
					//echo $senha . "<br>";
					return $conta["nome"];
				}
			}
		}
    }
?>
