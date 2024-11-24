<?php

class HorariosBanco
{
    private $pdo;
    
    public function __construct()
    {
        require __DIR__ . "/../Data/conectarbanco.php";
        $this->pdo = $pdo; 
        
    }


      public function cadastrarHorario(Visitantes $visitante,$idRegistro, $dataRegistro, $horaEntrada, $horaSaida,$placaVeiculo){
        $sql = "INSERT INTO horarios(idvisitante,idregistro, dataregistro, horaentrada, horasaida, placaveiculo) values (:v,:i,:d,:e,:s,:p)";
  
        $originalDate = $dataRegistro;
        $dataRegistro = date("Y-m-d", strtotime($originalDate));

        $originalHoraE = $horaEntrada;
        $horaEntrada= date("H:i:s", strtotime($originalHoraE));

        $originalHoraS = $horaSaida;
        $horaSaida= date("H:i:s", strtotime($originalHoraS));
        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("v",$visitante->getIdVisitante());
        $comando->bindValue("i",$idRegistro);
        $comando->bindValue("d",$dataRegistro);
        $comando->bindValue("e",$horaEntrada);
        $comando->bindValue("s",$horaSaida );
        $comando->bindValue("p",$placaVeiculo);
  
  
       return $comando->execute();
        }

      public function hidratar($array)
        {
            $todos = [];
    
            foreach ($array as $valor) {
                $horario = new Horarios();
               
                $visitante = new Visitantes();
                $visitante->setIdVisitante($valor['IDVISITANTE']);
                $horario->setVisitante($visitante);

                $horario->setIdRegistro($valor['IDREGISTRO']);
                $horario->setDataRegistro($valor['DATAREGISTRO']);
                $horario->setHoraEntrada($valor['HORAENTRADA']);
                $horario->setHoraSaida($valor['HORASAIDA']);
                $horario->setPlacaVeiculo($valor['PLACAVEICULO']);
                
    
                $todos[] = $horario;
            }
            return $todos;
        }

        public function hidratarSomenteUm($array)
        {
        
          $horario = new Horarios();
         
          $visitante = new Visitantes();
          $visitante->setIdVisitante($array['IDVISITANTE']);
          $horario->setVisitante($visitante);

          $horario->setIdRegistro($array['IDREGISTRO']);
          $horario->setDataRegistro($array['DATAREGISTRO']);
          $horario->setHoraEntrada($array['HORAENTRADA']);
          $horario->setHoraSaida($array['HORASAIDA']);
          $horario->setPlacaVeiculo($array['PLACAVEICULO']);
          

           return $horario;
        }
    

        public function ListarHorario(){

          $sql = "SELECT * FROM horarios";
          $comando = $this->pdo->prepare($sql);
          $comando->execute();
          $todosHorarios = $comando->fetchAll(PDO::FETCH_ASSOC);
          return $this->hidratar($todosHorarios) ;
         
          }

          public function buscarPorIdRegistro($idRegistro){
            $sql = "SELECT * FROM horarios WHERE idRegistro=:i";
    
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idRegistro);
            $comando->execute();
            $resultado = $comando->fetch(PDO::FETCH_ASSOC);
    
            return $this->hidratarSomenteUm($resultado);
        }

        public function EditarHorario(Visitantes $visitante,$idRegistro, $dataRegistro, $horaEntrada, $horaSaida,$placaVeiculo){
          $sql = "INSERT INTO horarios(idVisitante,idRegistro, dataRegistro, horaentrada, horasaida, placaveiculo) values (:v,:i,:d,:e,:s,:p)";

          $originalDate = $dataRegistro;
          $dataRegistro = date("Y-m-d", strtotime($originalDate));
  
          $originalHoraE = $horaEntrada;
          $horaEntrada= date("H:i:s", strtotime($originalHoraE));
  
          $originalHoraS = $horaSaida;
          $horaSaida= date("H:i:s", strtotime($originalHoraS));
          
          $comando = $this->pdo->prepare($sql);
          $comando->bindValue("v",$visitante->getIdVisitante());
          $comando->bindValue("i",$idRegistro);
          $comando->bindValue("d",$dataRegistro);
          $comando->bindValue("e",$horaEntrada);
          $comando->bindValue("s",$horaSaida );
          $comando->bindValue("p",$placaVeiculo);
      
          return $comando->execute();
      }
      
      public function AtualizarHorario(Visitantes $visitante,$idRegistro, $dataRegistro, $horaEntrada, $horaSaida,$placaVeiculo){
          $sql = "UPDATE horarios set idvisitante = :v,  dataregistro=:d,  horaentrada = :e, horasaida = :s, placaveiculo = :p where idregistro=:i";
      
          $originalDate = $dataRegistro;
        $dataRegistro = date("Y-m-d", strtotime($originalDate));

        $originalHoraE = $horaEntrada;
        $horaEntrada= date("H:i:s", strtotime($originalHoraE));

        $originalHoraS = $horaSaida;
        $horaSaida= date("H:i:s", strtotime($originalHoraS));
        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("v",$visitante->getIdVisitante());
        $comando->bindValue("i",$idRegistro);
        $comando->bindValue("d",$dataRegistro);
        $comando->bindValue("e",$horaEntrada);
        $comando->bindValue("s",$horaSaida );
        $comando->bindValue("p",$placaVeiculo);
      
          return $comando->execute();
      }
      
      public function ExcluirHorario($idRegistro){
          $sql = "DELETE FROM horarios WHERE idregistro = :i";
      
          $comando = $this->pdo->prepare($sql);
          $comando->bindValue("i",$idRegistro);
      
          return $comando->execute();
      }
    }