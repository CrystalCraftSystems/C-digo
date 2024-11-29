<?php

class MoradoresBanco
{
    private $pdo;

    public function __construct()
    {
        require __DIR__ . "/../Data/conectarbanco.php";
        $this->pdo = $pdo;
    }

    public function MoradoresResidencias(string $moradorId, string $residenciaId)
    {
        $sql = "INSERT INTO MORADORESRESIDENCIAS (MORADORID, RESIDENCIAID) VALUES (:MORADORID, :RESIDENCIAID)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':MORADORID', $moradorId);
        $stmt->bindValue(':RESIDENCIAID', $residenciaId);
        $stmt->execute();
    }

    public function cadastrarMorador($idMorador, $nomeMorador, $cpfMorador, $residenciaId)
    {
       
        $sql = "INSERT INTO moradores(idmorador, nomemorador, cpfmorador) values (:i,:n,:c)";

        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idMorador);
        $comando->bindValue("n", $nomeMorador);
        $comando->bindValue("c", $cpfMorador);
      
        $comando->execute();

        $sql = "INSERT INTO MORADORESRESIDENCIAS (MORADORID, RESIDENCIAID) VALUES (:MORADORID, :RESIDENCIAID)";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(':MORADORID', $idMorador);
        $comando->bindValue(':RESIDENCIAID', $residenciaId);

        return $comando->execute();
    }


 




    public function hidratarSomenteUm($array)
    {

        $morador = new Moradores();
        $morador->setIdMorador($array['IDMORADOR']);
        $morador->setNomeMorador($array['NOMEMORADOR']);
        $morador->setCpfMorador($array['CPFMORADOR']);


        return $morador;
    }

    public function ListarMorador()
    {
        $sql = "SELECT  r.IDRESIDENCIA, m.CPFMORADOR, m.NOMEMORADOR, m.IDMORADOR AS morador,  r.IDRESIDENCIA AS residencia FROM moradores m JOIN moradoresresidencias mr ON m.IDMORADOR = mr.MORADORID JOIN residencias r ON mr.RESIDENCIAID = r.IDRESIDENCIA ORDER BY m.NOMEMORADOR;";
        $comando = $this->pdo->prepare($sql);
        $comando->execute();

      return $comando->fetchAll();
  
    }

    public function buscarPorIdMorador($idMorador)
    {
        $sql = "SELECT  r.IDRESIDENCIA, m.CPFMORADOR, m.NOMEMORADOR, m.IDMORADOR AS morador,  r.IDRESIDENCIA AS residencia FROM moradores m JOIN moradoresresidencias mr ON m.IDMORADOR = mr.MORADORID JOIN residencias r ON mr.RESIDENCIAID = r.IDRESIDENCIA ORDER BY m.NOMEMORADOR;";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idMorador);
        $comando->execute();

        return  $comando->fetch(PDO::FETCH_ASSOC);
    }

    public function EditarMorador($idMorador, $nomeMorador, $cpfMorador, $residenciaId)
    {
        
        $sql = "UPDATE moradores SET nomemorador = :nome, cpfmorador = :cpf WHERE idmorador = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $nomeMorador);
        $stmt->bindValue(':cpf', $cpfMorador);
        $stmt->bindValue(':id', $idMorador);
        $stmt->execute();
    
        $sql = "UPDATE moradoresresidencias SET residenciaid = :residenciaId WHERE moradorid = :moradorId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':residenciaId', $residenciaId);
        $stmt->bindValue(':moradorId', $idMorador);
    
        return $stmt->execute();
    }

    public function AtualizarMorador($idMorador, $nomeMorador, $cpfMorador, $residenciaId)
    {
        
        $sql = "UPDATE moradores SET nomemorador = :nome, cpfmorador = :cpf WHERE idmorador = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $nomeMorador);
        $stmt->bindValue(':cpf', $cpfMorador);
        $stmt->bindValue(':id', $idMorador);
        $stmt->execute();
 
        
        $sql = "UPDATE moradoresresidencias SET residenciaid = :residenciaId WHERE moradorid = :moradorId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':residenciaId', $residenciaId);
        $stmt->bindValue(':moradorId', $idMorador);
    
        return $stmt->execute();
    }

    public function ExcluirMorador($idMorador)
    {
        $sql = "DELETE FROM moradores WHERE idmoradores = :i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idMorador);

        return $comando->execute();
    }
}


