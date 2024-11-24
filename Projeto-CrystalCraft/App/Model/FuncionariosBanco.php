<?php

class FuncionariosBanco
{
    private $pdo;
    
    public function __construct()
    {
        require __DIR__ . "/../Data/conectarbanco.php";
        $this->pdo = $pdo; 
        
    }


      public function cadastrarFuncionario($idFuncionario,$nomeFuncionario, $cpfFuncionario, $dataNascimentoFuncionario, $funcaoFuncionario){
        $sql = "INSERT INTO funcionarios(idfuncionario, nomefuncionario, cpffuncionario, datanascimentofuncionario, funcaofuncionario) values (:i,:n,:c,:d,:f)";
  
        $originalDate = $dataNascimentoFuncionario;
        $dataNascimentoFuncionario = date("Y-m-d", strtotime($originalDate));
        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i",$idFuncionario);
        $comando->bindValue("n",$nomeFuncionario);
        $comando->bindValue("c",$cpfFuncionario);
        $comando->bindValue("d",$dataNascimentoFuncionario);
        $comando->bindValue("f",$funcaoFuncionario );
  
  
       return $comando->execute();
        }

       public function hidratar($array)
        {
            $todos = [];
    
            foreach ($array as $valor) {
                $Funcionario = new Funcionarios();
                $Funcionario->setIdFuncionario($valor['IDFUNCIONARIO']);
                $Funcionario->setNomeFuncionario($valor['NOMEFUNCIONARIO']);
                $Funcionario->setCpfFuncionario($valor['CPFFUNCIONARIO']);
                $Funcionario->setDataNascimentoFuncionario($valor['DATANASCIMENTOFUNCIONARIO']);
                $Funcionario->setFuncaoFuncionario($valor['FUNCAOFUNCIONARIO']);
    
                $todos[] = $Funcionario;
            }
            return $todos;
        }

        public function hidratarSomenteUm($array)
        {
        
            $Funcionario = new Funcionarios();
            $Funcionario->setIdFuncionario($array['IDFUNCIONARIO']);
                $Funcionario->setNomeFuncionario($array['NOMEFUNCIONARIO']);
                $Funcionario->setCpfFuncionario($array['CPFFUNCIONARIO']);
                $Funcionario->setDataNascimentoFuncionario($array['DATANASCIMENTOFUNCIONARIO']);
                $Funcionario->setFuncaoFuncionario($array['FUNCAOFUNCIONARIO']);

           return $Funcionario;
        }
    

        public function ListarFuncionario(){

          $sql = "SELECT * FROM funcionarios";
          $comando = $this->pdo->prepare($sql);
          $comando->execute();
          $todosFuncionarios = $comando->fetchAll(PDO::FETCH_ASSOC);
          return $this->hidratar($todosFuncionarios) ;
         
          }

          public function buscarPorIdFuncionario($idFuncionario){
            $sql = "SELECT * FROM funcionarios WHERE idFuncionario=:i";
    
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idFuncionario);
            $comando->execute();
            $resultado = $comando->fetch(PDO::FETCH_ASSOC);
    
            return $this->hidratarSomenteUm($resultado);
        }

        public function EditarFuncionario($idFuncionario,$nomeFuncionario, $cpfFuncionario, $dataNascimentoFuncionario, $funcaoFuncionario){
            $sql = "INSERT INTO funcionarios(idfuncionario, nomefuncionario, cpffuncionario, datanascimentofuncionario, funcaofuncionario) values (:i,:n,:c,:d,:f)";

            $originalDate = $dataNascimentoFuncionario;
        $dataNascimentoFuncionario = date("Y-m-d", strtotime($originalDate));
        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i",$idFuncionario);
        $comando->bindValue("n",$nomeFuncionario);
        $comando->bindValue("c",$cpfFuncionario);
        $comando->bindValue("d",$dataNascimentoFuncionario);
        $comando->bindValue("f",$funcaoFuncionario );
        
            return $comando->execute();
        }
        
        public function AtualizarFuncionario($idFuncionario,$nomeFuncionario, $cpfFuncionario, $dataNascimentoFuncionario, $funcaoFuncionario){
            $sql = "UPDATE funcionarios set nomefuncionario = :n, cpffuncionario=:c, datanascimentofuncionario=:d,  funcaofuncionario = :f where idfuncionario = :i";
        
            $originalDate = $dataNascimentoFuncionario;
            $dataNascimentoFuncionario = date("Y-m-d", strtotime($originalDate));
            
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idFuncionario);
            $comando->bindValue("n",$nomeFuncionario);
            $comando->bindValue("c",$cpfFuncionario);
            $comando->bindValue("d",$dataNascimentoFuncionario);
            $comando->bindValue("f",$funcaoFuncionario );
        
            return $comando->execute();
        }
        
        public function ExcluirFuncionario($idFuncionario){
            $sql = "DELETE FROM funcionarios WHERE idfuncionario = :i";
        
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i",$idFuncionario);
        
            return $comando->execute();
        }
    }