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


    public function cadastrarVisitante($idVisitante, $nomeVisitante, $descricaoVisitante,  $moradores)
    {
        $sql = "INSERT INTO visitantes(idvisitante, nomevisitante, descricaovisitante, idmorador) values (:i,:n,:d,:m)";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idVisitante);
        $comando->bindValue("n", $nomeVisitante);
        $comando->bindValue("d", $descricaoVisitante);
        $comando->bindValue("m", $moradores);


        return $comando->execute();
    }

    public function BuscarMoradoresPeloIdVisitante($idVisitante)
    {
        $sql = "SELECT * FROM MORADORES  INNER JOIN VISITANTESMORADORES ON MORADORES.IDMORADOR =  VISITANTESMORADORES.MORADORID 
WHERE VISITANTESMORADORES.VISITANTEID = :IDVISITANTE ";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(':IDVISITANTE', $idVisitante);
        $comando->execute();

        $moradores = [];
        while ($row = $comando->fetch(PDO::FETCH_ASSOC)) {
            $morador = new Moradores;
            $morador->setIdMorador($row["IDMORADOR"]);
            $moradores[] = $morador;
        }
        return $moradores;
    }

    public function hidratar($array)
    {
        $todos = [];

        foreach ($array as $valor) {
            $visitante = new Visitantes();
            $visitante->setIdVisitante($valor['IDVISITANTE']);
            $visitante->setNomeVisitante($valor['NOMEVISITANTE']);
            $visitante->setDescricaoVisitante($valor['DESCRICAOVISITANTE']);

            $moradores = $this->BuscarMoradoresPeloIdVisitante($valor['IDVISITANTE']);
            $visitante->setIdMorador($moradores);

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
        $visitante->setIdMorador($moradores);



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
