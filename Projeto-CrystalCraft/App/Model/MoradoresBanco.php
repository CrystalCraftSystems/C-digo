<?php

class MoradoresBanco
{
    private $pdo;

    public function __construct()
    {
        require __DIR__ . "/../Data/conectarbanco.php";
        $this->pdo = $pdo;
    }


    public function cadastrarMorador($idMorador, $nomeMorador, $cpfMorador, Residencias $residencia )
    {
        $sql = "INSERT INTO moradores(idmorador, nomemorador, cpfmorador, idresidencia) values (:i,:n,:c,:r)";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idMorador);
        $comando->bindValue("n", $nomeMorador);
        $comando->bindValue("c", $cpfMorador);
        $comando->bindValue("r", $residencia->getIdResidencia());

        return $comando->execute();
    }

    public function hidratar($array)
    {
        $todos = [];
        foreach ($array as $valor) {
            $morador = new Moradores();
            $morador->setIdMorador($valor['IDMORADOR']);
            $morador->setNomeMorador($valor['NOMEMORADOR']);
            $morador->setCpfMorador($valor['CPFMORADOR']);



            $residencia = new Residencias();
            $residencia->setIdResidencia($valor['IDRESIDENCIA']);
            $morador->setResidencia($residencia);
            $todos[] = $morador;
        }
       

        return $todos;
    }




    public function hidratarSomenteUm($array)
    {

        $morador = new Moradores();
        $morador->setIdMorador($array['IDMORADOR']);
        $morador->setNomeMorador($array['NOMEMORADOR']);
        $morador->setCpfMorador($array['CPFMORADOR']);

        $residencia = new Residencias();
        $residencia->setIdResidencia($array['IDRESIDENCIA']);
        $morador->setResidencia($residencia);


        return $morador;
    }

    public function ListarMorador()
    {

        $sql = "SELECT * FROM moradores";
        $comando = $this->pdo->prepare($sql);
        $comando->execute();
        $todosMoradores = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $this->hidratar($todosMoradores);
    }
    public function buscarPorIdMorador($idMorador)
    {
        $sql = "SELECT * FROM moradores WHERE idMorador=:i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idMorador);
        $comando->execute();
        $resultado = $comando->fetch(PDO::FETCH_ASSOC);

        return $this->hidratarSomenteUm($resultado);
    }

    public function EditarMorador($idMorador, $nomeMorador, $cpfMorador, Residencias $residencia)
    {
        $sql = "INSERT INTO moradores(idmorador, nomemorador, cpfmorador, idresidencia) values (:i,:n,:c,:r)";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idMorador);
        $comando->bindValue("n", $nomeMorador);
        $comando->bindValue("c", $cpfMorador);
        $comando->bindValue("r",$residencia->getIdResidencia());

        return $comando->execute();
    }

    public function AtualizarMorador($idMorador, $nomeMorador, $cpfMorador, Residencias $residencia)
    {
        $sql = "UPDATE moradores set  nomemorador=:n, cpfmorador = :c, idresidencia = :r where idmorador=:i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idMorador);
        $comando->bindValue("n", $nomeMorador);
        $comando->bindValue("c", $cpfMorador);
        $comando->bindValue("r", $residencia->getIdResidencia());

        return $comando->execute();
    }

    public function ExcluirMorador($idMorador)
    {
        $sql = "DELETE FROM moradores WHERE idmoradores = :i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idMorador);

        return $comando->execute();
    }
}


