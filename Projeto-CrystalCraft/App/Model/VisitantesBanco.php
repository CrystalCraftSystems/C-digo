<?php

class VisitantesBanco
{
    private $pdo;
    
    public function __construct()
    {
        require __DIR__ . "/../Data/conectarbanco.php";
        $this->pdo = $pdo; 
        
    }


      public function cadastrarVisitante($idVisitante,$nomeVisitante, $descricaoVisitante, Moradores $morador){
        $sql = "INSERT INTO visitantes(idvisitante, nomevisitante, descricaovisitante, idmorador) values (:i,:n,:d,:m)";
        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i",$idVisitante);
        $comando->bindValue("n",$nomeVisitante);
        $comando->bindValue("d",$descricaoVisitante);
        $comando->bindValue("m",$morador->getIdMorador());
  
  
       return $comando->execute();
        }

       public function hidratar($array)
        {
            $todos = [];
    
            foreach ($array as $valor) {
                $visitante = new Visitantes();
                $visitante->setIdVisitante($valor['IDVISITANTE']);
                $visitante->setNomeVisitante($valor['NOMEVISITANTE']);
                $visitante->setDescricaoVisitante($valor['DESCRICAOVISITANTE']);
                
                $morador = new Moradores();
                $morador->setIdMorador($valor['IDMORADOR']);
                $visitante->setMorador($morador);
            
                $todos[] = $visitante;
            }
            return $todos;
        }

        public function hidratarSomenteUm($array)
        {
        
            $visitante = new Visitantes();
                $visitante->setIdVisitante($array['IDVISITANTE']);
                $visitante->setNomeVisitante($array['NOMEVISITANTE']);
                $visitante->setDescricaoVisitante($array['DESCRICAOVISITANTE']);
                
                $morador = new Moradores();
                $morador->setidMorador($array['IDMORADOR']);
                $visitante->setMorador($morador);
               
          

           return $visitante;
        }

        public function ListarVisitante(){

          $sql = "SELECT * FROM visitantes";
          $comando = $this->pdo->prepare($sql);
          $comando->execute();
          $todosVisitantes = $comando->fetchAll(PDO::FETCH_ASSOC);
          return $this->hidratar($todosVisitantes) ;
         
          }

          public function buscarPorIdVisitante($idVisitante){
            $sql = "SELECT * FROM visitantes WHERE idvisitante=:i";
    
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idVisitante);
            $comando->execute();
            $resultado = $comando->fetch(PDO::FETCH_ASSOC);
    
            return $this->hidratarSomenteUm($resultado);
        }

        public function EditarVisitante($idVisitante,$nomeVisitante, $descricaoVisitante, Moradores $morador){
            $sql = "INSERT INTO visitantes(idvisitante, nomevisitante, descricaovisitante, idmorador) values (:i,:n,:d,:m)";
  
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idVisitante);
            $comando->bindValue("n",$nomeVisitante);
            $comando->bindValue("d",$descricaoVisitante);
            $comando->bindValue("m",$morador->getIdMorador());
      
        
            return $comando->execute();
        }
        
        public function AtualizarVisitante($idVisitante,$nomeVisitante, $descricaoVisitante, Moradores $morador){
            $sql = "UPDATE visitantes set  nomevisitante=:n, descricaovisitante = :d, idmorador = :m where idvisitante=:i";
        
            $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i",$idVisitante);
        $comando->bindValue("n",$nomeVisitante);
        $comando->bindValue("d",$descricaoVisitante);
        $comando->bindValue("m",$morador->getIdMorador());
  
        
            return $comando->execute();
        }
        
        public function ExcluirVisitante($idVisitante){
            $sql = "DELETE FROM visitantes WHERE idvisitantes = :i";
        
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idVisitante);
        
            return $comando->execute();
        }
    }