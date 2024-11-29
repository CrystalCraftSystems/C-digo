<?php

class HorariosBanco
{
    private $pdo;
    
    public function __construct()
    {
        require __DIR__ . "/../Data/conectarbanco.php";
        $this->pdo = $pdo; 
        
    }

    public function   HorariosVisitantes(string $registroId, string $visitanteId)
    {
        $sql = "INSERT INTO HORARIOSVISITANTES (REGISTROID, VISITANTEID) VALUES (:REGISTROID, :VISITANTEID)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':REGISTROID', $registroId);
        $stmt->bindValue(':VISITANTEID', $visitanteId);
        $stmt->execute();
    }

    public function cadastrarHorario($visitanteId,$idRegistro, $dataRegistro, $horaEntrada, $horaSaida,$placaVeiculo)
    {
   
        $sql = "INSERT INTO horarios(idregistro, dataregistro, horaentrada, horasaida, placaveiculo) values (:i,:d,:e,:s,:p)";
        
        $originalDate = $dataRegistro;
        $dataRegistro = date("Y-m-d", strtotime($originalDate));

        $originalHoraE = $horaEntrada;
        $horaEntrada= date("H:i:s", strtotime($originalHoraE));

        $originalHoraS = $horaSaida;
        $horaSaida= date("H:i:s", strtotime($originalHoraS));
        
        $comando = $this->pdo->prepare($sql);
      
        $comando->bindValue("i",$idRegistro);
        $comando->bindValue("d",$dataRegistro);
        $comando->bindValue("e",$horaEntrada);
        $comando->bindValue("s",$horaSaida );
        $comando->bindValue("p",$placaVeiculo);
  
  
       $comando->execute();

        $sql = "INSERT INTO HORARIOSVISITANTES (REGISTROID, VISITANTEID) VALUES (:REGISTROID, :VISITANTEID)";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(':REGISTROID', $idRegistro);
        $comando->bindValue(':VISITANTEID', $visitanteId);

        return $comando->execute();
    }

          public function ListarHorario()
          {
              $sql = "SELECT  v.IDVISITANTE, h.DATAREGISTRO, h.HORAENTRADA, h.HORASAIDA, h.PLACAVEICULO, h.IDREGISTRO AS horario,  v.IDVISITANTE AS visitante FROM horarios h JOIN horariosvisitantes hv ON h.IDREGISTRO = hv.REGISTROID JOIN visitantes v ON hv.VISITANTEID = v.IDVISITANTE ORDER BY v.NOMEVISITANTE;";
      
              $comando = $this->pdo->prepare($sql);
              $comando->execute();
      
            return $comando->fetchAll();
        
          }

          public function buscarPorIdRegistro($idRegistro){
            $sql = "SELECT  v.IDVISITANTE, h.DATAREGISTRO, h.HORAENTRADA, h.HORASAIDA, h.PLACAVEICULO, h.IDREGISTRO AS horario,  v.IDVISITANTE AS visitante FROM horarios h JOIN horariosvisitantes hv ON h.IDREGISTRO = hv.REGISTROID JOIN visitantes v ON hv.VISITANTEID = v.IDVISITANTE ORDER BY v.NOMEVISITANTE;";
    
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idRegistro);
            $comando->execute();
            $resultado = $comando->fetch(PDO::FETCH_ASSOC);
    
            return  $comando->fetch(PDO::FETCH_ASSOC);
        }

        public function EditarHorario($visitanteId,$idRegistro, $dataRegistro, $horaEntrada, $horaSaida,$placaVeiculo)
        {

          $originalDate = $dataRegistro;
          $dataRegistro = date("Y-m-d", strtotime($originalDate));
  
          $originalHoraE = $horaEntrada;
          $horaEntrada= date("H:i:s", strtotime($originalHoraE));
  
          $originalHoraS = $horaSaida;
          $horaSaida= date("H:i:s", strtotime($originalHoraS));

            $sql = "UPDATE horarios SET dataregistro = :dataregistro, horaentrada = :horaentrada, horasaida=:horasaida WHERE idregistro = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':dataregistro', $dataRegistro);
            $stmt->bindValue(':horaentrada', $horaEntrada);
            $stmt->bindValue(':horasaida', $horaSaida);
            $stmt->bindValue(':id', $idRegistro);
            $stmt->execute();
        
            
            $sql = "UPDATE horariosvisitantes SET visitanteid = :visitanteId WHERE registroid = :registroId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':visitanteId', $visitanteId);
            $stmt->bindValue(':registroId', $idRegistro);
        
            return $stmt->execute();
        }

      
     
        public function AtualizarHorario($visitanteId,$idRegistro, $dataRegistro, $horaEntrada, $horaSaida,$placaVeiculo)
      {

        $originalDate = $dataRegistro;
        $dataRegistro = date("Y-m-d", strtotime($originalDate));

        $originalHoraE = $horaEntrada;
        $horaEntrada= date("H:i:s", strtotime($originalHoraE));

        $originalHoraS = $horaSaida;
        $horaSaida= date("H:i:s", strtotime($originalHoraS));

         
          $sql = "UPDATE horarios SET dataregistro = :dataregistro, horaentrada = :horaentrada, horasaida=:horasaida WHERE idregistro = :id";
          $stmt = $this->pdo->prepare($sql);
          $stmt->bindValue(':dataregistro', $dataRegistro);
          $stmt->bindValue(':horaentrada', $horaEntrada);
          $stmt->bindValue(':horasaida', $horaSaida);
          $stmt->bindValue(':id', $idRegistro);
          $stmt->execute();
      
         
          $sql = "UPDATE horariosvisitantes SET visitanteid = :visitanteId WHERE registroid = :registroId";
          $stmt = $this->pdo->prepare($sql);
          $stmt->bindValue(':visitanteId', $visitanteId);
          $stmt->bindValue(':registroId', $idRegistro);
      
          return $stmt->execute();
      }
      
      public function ExcluirHorario($idRegistro){
          $sql = "DELETE FROM horarios WHERE idregistro = :i";
      
          $comando = $this->pdo->prepare($sql);
          $comando->bindValue("i",$idRegistro);
      
          return $comando->execute();
      }
    }