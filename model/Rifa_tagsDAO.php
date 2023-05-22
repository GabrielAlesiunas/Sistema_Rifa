<?php
require_once 'DataBase.php';
require_once 'Rifa_tags.php';
class Rifa_tagsDAO
{
    private $pdo;
    private $erro;

    public function getErro(){
        return $this->erro;
    }

    public function __construct()
    {
        try {
            $this->pdo = (new DataBase())->connection();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            $this->erro = 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
            die;
        }
    }



    public function insert(Rifa_tags $rifa_tags):bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO Rifa_tags (fk_Rifa_id, fk_Tags_id, creation_time) VALUES (:fk_Rifa_id, :fk_Tags_id, :creation_time)");
        $dados = [
            'fk_Rifa_id' => $rifa_tags->getFk_Rifa_id(),
            'fk_Tags_id' => $rifa_tags->getFk_Tags_id(),
            'creation_time' => $rifa_tags->getCreationTime(),
        ];
        try {
            $stmt->execute($dados);
            return $this->selectById($this->pdo->lastInsertId());
        } catch (\PDOException $e) {
            $this->erro = 'Erro ao inserir Rifas tags: ' . $e->getMessage();
            return false;
        }
    }

    // public function selectById($fk_Rifa_id):bool
    // {
    //     $stmt = $this->pdo->prepare("SELECT * FROM Rifa_tags");
    //     try {
    //         if($stmt->execute(['fk_Rifa_id'=>$fk_Rifa_id])){
    //             $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //             return (new Rifa_tags(true, $row['fk_Rifa_id'], $row['fk_Tags_id'], $row['creation_time']));
    //         }
    //         return false;   

    //     } catch (\PDOException $e) {
    //         $this->erro = 'Erro ao selecionar usuário: ' . $e->getMessage();
    //         return false;
    //     }
    // }

    public function listarTodos(){
        $cmdSql = "SELECT * FROM rifa_tags";
        $cx = $this->pdo->prepare($cmdSql);
        $cx->execute();
        if($cx->rowCount() > 0){
            $cx->setFetchMode(PDO::FETCH_CLASS, 'rifa_tags');
            return $cx->fetchAll();
        }
        return false;
    }

    public function select($filtro=""):bool{
        $cmdSql = 'SELECT * FROM rifa_tags WHERE fk_Rifa_id LIKE :fk_Rifa_id OR fk_Tags_id LIKE :fk_Tags_id';
        try{
            $cx = $this->pdo->prepare($cmdSql);
            $cx->bindValue(':fk_Rifa_id',"%$filtro%");
            $cx->bindValue(':fk_Tags_id',"%$filtro%");
            $cx->execute();
            $cx->setFetchMode(PDO::FETCH_CLASS, 'rifa_tags');
            return $cx->fetchAll();
        }
        catch (\PDOException $e) {
            $this->erro = 'Erro ao selecionar rifa_tags: ' . $e->getMessage();
            return false;
        }
    }


    // public function update(Usuario $usuario)
    // {
    //     $stmt = $this->pdo->prepare("UPDATE Usuario SET email = ?, senha = ?, nome = ?, foto = ?, tel = ?, endereco = ?, cpf = ? WHERE id = ?");
    //     $email = $usuario->getEmail();
    //     $senha = $usuario->getSenha();
    //     $nome = $usuario->getNome();
    //     $foto = $usuario->getFoto();
    //     $tel = $usuario->getTel();
    //     $endereco = $usuario->getEndereco();
    //     $cpf = $usuario->getCpf();
    //     $id = $usuario->getId();
    //     try {
    //         $stmt->execute([$email, $senha, $nome, $foto, $tel, $endereco, $cpf, $id]);
    //         return $stmt->rowCount();
    //     } catch (PDOException $e) {
    //         throw new Exception('Erro ao atualizar usuário: ' . $e->getMessage());
    //     }
    // }

    public function deleteById($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM rifa_tags WHERE rifa_tags.fk_Rifa_id = ?");
        try {
            $stmt->execute([$id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception('Erro ao excluir rifa_tags: ' . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}