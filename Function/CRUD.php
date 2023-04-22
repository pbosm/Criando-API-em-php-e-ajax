<?php

class Functions
{

    public function updateClient($id, $cliente, $cidade, $email)
    {
        require_once('../conn.php');
        $conn = Database::connectionPDO();

        try {
            $code = $conn->prepare('UPDATE clientes SET cliente=:cliente, cidade=:cidade, email=:email WHERE id = :id');
            $code->bindParam(':id', $id);
            $code->bindParam(':cliente', $cliente);
            $code->bindParam(':cidade', $cidade);
            $code->bindParam(':email', $email);
            $code->execute();

            return "{$cliente} Editado com sucesso";

        } catch (exception $e) {
            return "Erro: {$e}";
        }

    }

    public function deleteClient($id, $cliente)
    {
        require_once('../conn.php');
        $conn = Database::connectionPDO();

        try {
            $code = $conn->prepare('DELETE FROM clientes WHERE id = :id');
            $code->bindParam(':id', $id);
            $code->execute();

            return "{$cliente} Apagado com sucesso";
        } catch (exception $e) {
            return "Erro: {$e}";
        }

    }

    public function insertClient($cliente, $cidade, $email)
    {
        require_once('../conn.php');
        $conn = Database::connectionPDO();

        try {
            $sql = $conn->prepare("INSERT INTO clientes (cliente, cidade, email) VALUES (:cliente, :cidade, :email)");
            $sql->bindParam(':cliente', $cliente);
            $sql->bindParam(':cidade', $cidade);
            $sql->bindParam(':email', $email);
            $sql->execute();

            return "{$cliente} Cadastrado com sucesso";
        } catch (exception $e) {
            return "Erro: {$e}";
        }
    }

    public function showClient()
    {
        require_once('../conn.php');
        $conn = Database::connectionPDO();

        $code = $conn->prepare("SELECT * FROM clientes");
        $code->execute();
        $select = $code->fetchAll(PDO::FETCH_ASSOC);

        return $select;
    }

}

?>