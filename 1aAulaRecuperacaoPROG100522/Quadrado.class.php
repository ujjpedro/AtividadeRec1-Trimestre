<?php
    class Quadrado{
        private $id;
        private $lado = 0.000;
        private $cor = "";
        private $tabuleiro_idTabuleiro;

        public function __construct($id,$lado, $cor, $tabuleiro_idTabuleiro){
            $this->setLado($lado);
            $this->setCor($cor);
            $this->setId($id);
            $this->setTabuleiro_idTabuleiro($tabuleiro_idTabuleiro);
        }

        public function getLado(){
            return $this->lado;
        }

        public function setLado($lado){
            if($lado > 0)
            $this->lado = $lado;
        }

        public function getCor(){
            return $this->cor;
        }

        public function setCor($cor){
            if(strlen($cor) > 0)
            $this->cor = $cor;
        }
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            if($id > 0) 
            $this->id = $id;
        }

        public function getTabuleiro_idTabuleiro(){
            return $this->tabuleiro_idTabuleiro;
        }

        public function setTabuleiro_idTabuleiro($tabuleiro_idTabuleiro){
            if($tabuleiro_idTabuleiro > 0) 
            $this->tabuleiro_idTabuleiro = $tabuleiro_idTabuleiro;
        }


        public function __toString(){
            $str = "Id: ".$this->getId().
            "<br><br>Cor do Quadrado: ".$this->getCor().
            "<br><br> Numero de Lados: ".$this->getLado().
            "<br><br>".
            "Id do Tabuleiro: ".$this->getTabuleiro_idTabuleiro().
            "<br><br>".
            "Area do Quadrado: ".$this->area().
            "<br><br>".
            "Perimetro do Quadrado: ".$this->perimetro().
            "<br><br>".
            "Diagonal: ".$this->diagonal().
            "<br><br>";

            return $str;
        }

        public function area(){
            return ($this->lado * $this->lado);
        }

        public function perimetro(){
            return ($this->lado * 4);
        }

        public function diagonal(){
            return ($this->lado * sqrt(2));
        }

        public function inserir(){
            $pdo = Conexao:: getInstance();
            $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor, tabuleiro_idTabuleiro) VALUES (:lado, :cor, :tabuleiro_idTabuleiro)');
            $stmt->bindValue(':lado', $this->getLado());
            $stmt->bindValue(':cor', $this->getCor());
            $stmt->bindValue(':tabuleiro_idTabuleiro', $this->getTabuleiro_idTabuleiro());
            
            return $stmt->execute();
            
        }

        public function excluir(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
            $stmt->bindValue(':id',$this->getId(), PDO::PARAM_STR);
            
            return $stmt->execute();

            //$stmt->debugDumpParams();
        }

        public function editar() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE `quadrado` SET `lado` = :lado, `cor` = :cor, `tabuleiro_idTabuleiro` = :tabuleiro_idTabuleiro WHERE (`id` = :id);");
            $stmt->bindValue(':id', $this->getId(), PDO::PARAM_INT);
            $stmt->bindValue(':lado', $this->getLado(), PDO::PARAM_STR);
            $stmt->bindValue(':cor', $this->getCor(), PDO::PARAM_STR);
            $stmt->bindValue(':tabuleiro_idTabuleiro', $this->getTabuleiro_idTabuleiro(), PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function buscarQuadrado(){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM quadrado';
            if($id > 0){
                $query .= ' WHERE id = :id';
                $stmt->bindParam(':id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;

        }

        // public function listarTabuleiro($tabuleiro_idTabuleiro){
        //     $quadrado = new Quadrado("","","","");
        //     $lista = $quadrado->buscarQuadrado($tabuleiro_idTabuleiro);

        //     return listarTabuleiro(array('tabuleiro_idTabuleiro'), $lista);
    
        // }

        // public function listar($cnst = 0, $procurar = ""){
        //     $pdo = Conexao::getInstance();
        //     $sql = "SELECT * FROM quadrado";
        //     if ($cnst > 0)
        //         switch($cnst){
        //             case(1): $sql .= " WHERE lado like :procurar"; $procurar .="%"; break;
        //             case(2): $sql .= " WHERE cor like :procurar"; $procurar .="%"; break;
        //             case(3): $sql .= " WHERE tabuleiro_idTabuleiro = :procurar"; break;
        //         }
        //     $stmt = $pdo->prepare($sql);
        //     if ($cnst > 0)
        //         $stmt->bindValue(':procurar', $procurar, PDO::PARAM_STR);
        //     $stmt->execute();
        //     return $stmt->fetchAll();
        // }
    }

?>