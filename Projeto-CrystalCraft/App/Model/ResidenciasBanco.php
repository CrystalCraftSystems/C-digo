<?php

class ResidenciasBanco
{
    private $pdo;
    
    public function __construct()
    {
        require __DIR__ . "/../Data/conectarbanco.php";
        $this->pdo = $pdo; 
        
    }


      public function cadastrarResidencia($idResidencia,$numResidencia, $bloco, Moradores $morador){
        $sql = "INSERT INTO residencias(idresidencia, numresidencia, bloco, idMorador) values (:i,:n,:b,:m)";
        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i",$idResidencia);
        $comando->bindValue("n",$numResidencia);
        $comando->bindValue("b",$bloco);
        $comando->bindValue("m",$morador->getIdMorador());
 
  
  
       return $comando->execute();
        }

       public function hidratar($array)
        {
            $todos = [];
    
            foreach ($array as $valor) {
                $residencia = new Residencias();
                $residencia->setIdresidencia($valor['IDRESIDENCIA']);
                $residencia->setNumResidencia($valor['NUMRESIDENCIA']);
                $residencia->setBloco($valor['BLOCO']);

                $morador = new Moradores();
                $morador->setidMorador($valor['IDMORADOR']);
                $residencia->setMorador($morador);
               
    
                $todos[] = $residencia;
            }
            return $todos;
        }

        public function hidratarSomenteUm($array)
        {
        
            $residencia = new Residencias();
                $residencia->setIdresidencia($array['IDRESIDENCIA']);
                $residencia->setNumResidencia($array['NUMRESIDENCIA']);
                $residencia->setBloco($array['BLOCO']);

                $morador = new Moradores();
                $morador->setidMorador($array['IDMORADOR']);
                $residencia->setMorador($morador);
               
          

           return $residencia;
        }

        public function ListarResidencia(){

          $sql = "SELECT * FROM residencias";
          $comando = $this->pdo->prepare($sql);
          $comando->execute();
          $todasResidencias = $comando->fetchAll(PDO::FETCH_ASSOC);
          return $this->hidratar($todasResidencias) ;
         
          }

          public function buscarPorIdResidencia($idResidencia){
            $sql = "SELECT * FROM residencias WHERE idResidencia=:i";
    
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idResidencia);
            $comando->execute();
            $resultado = $comando->fetch(PDO::FETCH_ASSOC);
    
            return $this->hidratarSomenteUm($resultado);
        }

        public function EditarResidencia($idResidencia,$numResidencia, $bloco, Moradores $morador){
            $sql = "INSERT INTO residencias(idresidencia, numresidencia, bloco, idMorador) values (:i,:n,:b,:m)";
  
          
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i",$idResidencia);
        $comando->bindValue("n",$numResidencia);
        $comando->bindValue("b",$bloco);
        $comando->bindValue("m",$morador->getIdMorador());
 
  
        
            return $comando->execute();
        }
        
        public function AtualizarResidencia($idResidencia,$numResidencia, $bloco, Moradores $morador){
            $sql = "UPDATE residencias set  numresidencia=:n, bloco= :b, idmorador = :m where idresidencia=:i";
        
         
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i",$idResidencia);
        $comando->bindValue("n",$numResidencia);
        $comando->bindValue("b",$bloco);
        $comando->bindValue("m",$morador->getIdMorador());
 
  
        
            return $comando->execute();
        }
        
        public function ExcluirResidencia($idResidencia){
            $sql = "DELETE FROM residencias WHERE idresidencia = :i";
        
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idResidencia);
        
            return $comando->execute();
        }
    }