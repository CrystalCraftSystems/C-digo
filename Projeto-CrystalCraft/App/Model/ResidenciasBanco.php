<?php

class ResidenciasBanco
{
    private $pdo;
    
    public function __construct()
    {
        require __DIR__ . "/../Data/conectarbanco.php";
        $this->pdo = $pdo; 
        
    }

    public function ResidenciasMoradores(string $residenciaId, string $moradorId)
    {
        $sql = "INSERT INTO RESIDENCIASMORADORES (RESIDENCIAID, MORADORID) VALUES (:RESIDENCIAID, :MORADORID)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':RESIDENCIAID', $residenciaId);
        $stmt->bindValue(':MORADORID', $moradorId);
        $stmt->execute();
    }

      public function cadastrarResidencia($idResidencia,$numResidencia, $bloco, $moradorId){
        $sql = "INSERT INTO residencias(idresidencia, numresidencia, bloco) values (:i,:n,:b)";
        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i",$idResidencia);
        $comando->bindValue("n",$numResidencia);
        $comando->bindValue("b",$bloco);
       
        $comando->execute();

        $sql = "INSERT INTO RESIDENCIASMORADORES (RESIDENCIAID, MORADORID) VALUES (:RESIDENCIAID, :MORADORID)";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(':RESIDENCIAID', $idResidencia);
        $comando->bindValue(':MORADORID', $moradorId);

        return $comando->execute();
        }

       /*public function hidratar($array)
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
        }*/

        public function listarResidenciaMorador()
        {
            $sql = "SELECT  m.IDMORADOR, r.NUMRESIDENCIA, r.BLOCO, r.IDRESIDENCIA AS residencia,  m.NOMEMORADOR AS morador FROM residencias v JOIN residenciasmoradores rm ON r.IDRESIDENCIA = rm.RESIDENCIAID JOIN moradores m ON rm.MORADORID = m.IDMORADOR ORDER BY m.NOMEMORADOR;";
    
            $comando = $this->pdo->prepare($sql);
            $comando->execute();
    
          return $comando->fetchAll();
      
        }

        public function ListarResidencia(){

          $sql = "SELECT * FROM residencias";
          $comando = $this->pdo->prepare($sql);
          $comando->execute();
          $todasResidencias = $comando->fetchAll(PDO::FETCH_ASSOC);
          //return $this->hidratar($todasResidencias) ;
         
          }

        /*  public function buscarPorIdResidencia($idResidencia){
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
        }*/
    }