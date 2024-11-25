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

    public function listaVisitanteMorador()
    {
        $sql = "SELECT  m.IDMORADOR, v.DESCRICAOVISITANTE, v.NOMEVISITANTE AS visitante,  m.NOMEMORADOR AS morador FROM visitantes v JOIN visitantesmoradores vm ON v.IDVISITANTE = vm.VISITANTEID JOIN moradores m ON vm.MORADORID = m.IDMORADOR ORDER BY m.NOMEMORADOR;";

        $comando = $this->pdo->prepare($sql);
        $comando->execute();

      return $comando->fetchAll();
  
    }

    public function hidratar($array)
    {
        $todos = [];

        foreach ($array as $valor) {
            $visitante = new Visitantes();
            $visitante->setIdVisitante($valor['IDVISITANTE']);
            $visitante->setNomeVisitante($valor['NOMEVISITANTE']);
            $visitante->setDescricaoVisitante($valor['DESCRICAOVISITANTE']);

         //  $moradores = $this->BuscarMoradoresPeloIdVisitante($valor['IDVISITANTE']);
           //$visitante->setMoradores($moradores);

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

        $moradores = $this->BuscarMoradoresPeloIdVisitante($array['IDVISITANTE']);
        $visitante->setMoradores($moradores);



        return $visitante;
    }

    public function ListarVisitante()
    {

        $sql = "SELECT * FROM visitantes";
        $comando = $this->pdo->prepare($sql);
        $comando->execute();
        $todosVisitantes = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $this->hidratar($todosVisitantes);
    }

    public function buscarPorIdVisitante($idVisitante)
    {
        $sql = "SELECT * FROM visitantes WHERE idvisitante=:i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);
        $comando->execute();
        $resultado = $comando->fetch(PDO::FETCH_ASSOC);

        return $this->hidratarSomenteUm($resultado);
    }

    public function EditarVisitante($idVisitante, $nomeVisitante, $descricaoVisitante,$moradores)
    {
        $sql = "INSERT INTO visitantes(idvisitante, nomevisitante, descricaovisitante, idmorador) values (:i,:n,:d,:m)";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);
        $comando->bindValue("n", $nomeVisitante);
        $comando->bindValue("d", $descricaoVisitante);
        $comando->bindValue("m", $moradores);


        return $comando->execute();
    }

    public function AtualizarVisitante($idVisitante, $nomeVisitante, $descricaoVisitante, $moradores)
    {
        $sql = "UPDATE visitantes set  nomevisitante=:n, descricaovisitante = :d, idmorador = :m where idvisitante=:i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);
        $comando->bindValue("n", $nomeVisitante);
        $comando->bindValue("d", $descricaoVisitante);
        $comando->bindValue("m", $moradores);


        return $comando->execute();
    }

    public function ExcluirVisitante($idVisitante)
    {
        $sql = "DELETE FROM visitantes WHERE idvisitantes = :i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);

        return $comando->execute();
    }
}
