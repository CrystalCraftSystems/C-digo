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

    public function cadastrarResidencia($idResidencia, $numResidencia, $bloco, $moradorId)
    {

        if ($moradorId == null) {

            $sql = "INSERT INTO residencias(idresidencia, numresidencia, bloco) values (:i,:n,:b)";

            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i", $idResidencia);
            $comando->bindValue("n", $numResidencia);
            $comando->bindValue("b", $bloco);

            $comando->execute();
        } else {

            $sql = "INSERT INTO residencias(idresidencia, numresidencia, bloco) values (:i,:n,:b)";

            $comando = $this->pdo->prepare($sql);
            $comando->bindValue("i", $idResidencia);
            $comando->bindValue("n", $numResidencia);
            $comando->bindValue("b", $bloco);

            $comando->execute();

            $sql = "INSERT INTO RESIDENCIASMORADORES (RESIDENCIAID, MORADORID) VALUES (:RESIDENCIAID, :MORADORID)";
            $comando = $this->pdo->prepare($sql);
            $comando->bindValue(':RESIDENCIAID', $idResidencia);
            $comando->bindValue(':MORADORID', $moradorId);

            return $comando->execute();
        }
    }


    public function hidratarSomenteUm($array)
    {

        $residencia = new Residencias();
        $residencia->setIdresidencia($array['IDRESIDENCIA']);
        $residencia->setNumResidencia($array['NUMRESIDENCIA']);
        $residencia->setBloco($array['BLOCO']);


        return $residencia;
    }

    public function listarResidencia()
    {
        //COALESCE retorna o primeiro valor não nulo encontrado

        $sql = "SELECT r.IDRESIDENCIA AS residencia, r.NUMRESIDENCIA, r.BLOCO, COALESCE(m.IDMORADOR, 'NULL') AS IDMORADOR FROM residencias r LEFT JOIN residenciasmoradores rm ON r.IDRESIDENCIA = rm.RESIDENCIAID LEFT JOIN moradores m ON rm.MORADORID = m.IDMORADOR";
        $comando = $this->pdo->prepare($sql);
        $comando->execute();

        return $comando->fetchAll();
    }

    public function buscarPorIdResidencia($idResidencia)
    {
        $sql = "SELECT * FROM residencias WHERE idResidencia=:i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idResidencia);
        $comando->execute();


        return  $comando->fetch(PDO::FETCH_ASSOC);
    }

    public function EditarResidencia($idResidencia, $numResidencia, $bloco, $moradorId)
    {
        $sql = "UPDATE residencias SET  numresidencia = :n, bloco=:b WHERE idresidencia = :i";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("i", $idResidencia);
        $stmt->bindValue("n", $numResidencia);
        $stmt->bindValue("b", $bloco);
        $stmt->execute();

        $sql = "SELECT r.* FROM residencias r LEFT JOIN residenciasmoradores rm ON r.IDRESIDENCIA = rm.RESIDENCIAID WHERE r.IDRESIDENCIA = :id AND rm.MORADORID IS NULL ";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idResidencia);
        $comando->execute();
        $moradorNull =  $comando->fetch(PDO::FETCH_ASSOC);

        if ($moradorNull) {

            $sql = "INSERT INTO residenciasmoradores (residenciaid,moradorid) VALUES  (:residenciaId, :moradorid)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':moradorId', $moradorId);
            $stmt->bindValue(':residenciaId', $idResidencia);
        } else {

            $sql = "UPDATE residenciasmoradores SET moradorid = :moradorId WHERE residenciaid = :residenciaId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':moradorId', $moradorId);
            $stmt->bindValue(':residenciaId', $idResidencia);
        }
        return $stmt->execute();
    }

    public function AtualizarResidencia($idResidencia, $numResidencia, $bloco, $moradorId)
    {


        $sql = "UPDATE residencias SET  numresidencia = :n, bloco=:b WHERE idresidencia = :i";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("i", $idResidencia);
        $stmt->bindValue("n", $numResidencia);
        $stmt->bindValue("b", $bloco);
        $stmt->execute();


        $sql = "UPDATE residenciasmoradores SET moradorid = :moradorId WHERE residenciaid = :residenciaId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':moradorId', $moradorId);
        $stmt->bindValue(':residenciaId', $idResidencia);

        return $stmt->execute();
    }


    public function ExcluirResidencia($idResidencia)
    {
        $sql = "DELETE FROM residencias WHERE idresidencia = :i";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("i", $idResidencia);

        return $comando->execute();
    }
}
