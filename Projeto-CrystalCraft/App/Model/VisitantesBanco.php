<?php

class VisitantesBanco
{
    private $pdo;

    public function __construct()
    {
        require __DIR__ . "/../Data/conectarbanco.php";
        $this->pdo = $pdo;
    }

    public function VisitantesMoradores(string $visitanteId, string $moradorId)
    {
        $sql = "INSERT INTO VISITANTESMORADORES (VISITANTEID, MORADORID) VALUES (:VISITANTEID, :MORADORID)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':VISITANTEID', $visitanteId);
        $stmt->bindValue(':MORADORID', $moradorId);
        $stmt->execute();
    }


    public function cadastrarVisitante($idVisitante, $nomeVisitante, $descricaoVisitante,$moradorId)
    {
        //sql para cadastrar o visitante "isolado" do morador, logo não estará associado ao morador
        $sql = "INSERT INTO visitantes(idvisitante, nomevisitante, descricaovisitante) values (:i,:n,:d)";

        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);
        $comando->bindValue("n", $nomeVisitante);
        $comando->bindValue("d", $descricaoVisitante);
     
        $comando->execute();

        $sql = "INSERT INTO VISITANTESMORADORES (VISITANTEID, MORADORID) VALUES (:VISITANTEID, :MORADORID)";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(':VISITANTEID', $idVisitante);
        $comando->bindValue(':MORADORID', $moradorId);

        return $comando->execute();
    }

    public function ListarVisitanteMorador()
    {
        $sql = "SELECT  m.IDMORADOR, v.DESCRICAOVISITANTE, v.NOMEVISITANTE, v.IDVISITANTE AS visitante,  m.NOMEMORADOR AS morador FROM visitantes v JOIN visitantesmoradores vm ON v.IDVISITANTE = vm.VISITANTEID JOIN moradores m ON vm.MORADORID = m.IDMORADOR ORDER BY m.NOMEMORADOR;";

        $comando = $this->pdo->prepare($sql);
        $comando->execute();

      return $comando->fetchAll();
  
    }

    public function hidratarSomenteUm($array)
    {

        $visitante = new Visitantes();
        $visitante->setIdVisitante($array['IDVISITANTE']);
        $visitante->setNomeVisitante($array['NOMEVISITANTE']);
        $visitante->setDescricaoVisitante($array['DESCRICAOVISITANTE']);


        return $visitante;
    }

    public function buscarPorIdVisitante($idVisitante)
    {
        $sql = "SELECT  m.IDMORADOR, v.DESCRICAOVISITANTE, v.NOMEVISITANTE, v.IDVISITANTE ,  m.NOMEMORADOR  FROM visitantes v JOIN visitantesmoradores vm ON v.IDVISITANTE = :i JOIN moradores m ON vm.MORADORID = m.IDMORADOR ORDER BY m.NOMEMORADOR";
        
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);
        $comando->execute();

        return  $comando->fetch(PDO::FETCH_ASSOC);
    }

    public function EditarVisitante($idVisitante, $nomeVisitante, $descricaoVisitante,$moradorId)
    {
        $sql = "INSERT INTO visitantes(idvisitante, nomevisitante, descricaovisitante) values (:i,:n,:d)";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);
        $comando->bindValue("n", $nomeVisitante);
        $comando->bindValue("d", $descricaoVisitante);
       


      $comando->execute();

        $sql = "INSERT INTO VISITANTESMORADORES (VISITANTEID, MORADORID) VALUES (:VISITANTEID, :MORADORID)";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(':VISITANTEID', $idVisitante);
        $comando->bindValue(':MORADORID', $moradorId);

        return $comando->execute();
    }

    public function AtualizarVisitante($idVisitante, $nomeVisitante, $descricaoVisitante, $moradorId)
    {
        $sql = "UPDATE visitantes set  nomevisitante=:n, descricaovisitante = :d, idmorador = :m where idvisitante=:i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);
        $comando->bindValue("n", $nomeVisitante);
        $comando->bindValue("d", $descricaoVisitante);
        $comando->bindValue("m", $moradorId);


     $comando->execute();

     $sql = "UPDATE VISITANTESMORADORES SET VISITANTEID=:V, MORADORID=:M WHERE VISITANTEID= :V";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(':V', $idVisitante);
        $comando->bindValue(':M', $moradorId);

        return $comando->execute();
    }

    public function ExcluirVisitante($idVisitante)
    {
        $sql = "DELETE FROM visitantes WHERE idvisitante = :i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);

        return $comando->execute();
    }
}
