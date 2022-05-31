<?php

namespace App\DAO\MySQL\CodeeasyGerenciadorDeLojas;

use App\Models\MySQL\CodeeasyGerenciadorDeLojas\ProdutoModel;

class ProdutosDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProdutosFromLoja(int $lojaId): array
    {
        $statement = $this->pdo
            ->prepare('SELECT
                    *
                FROM produtos
                WHERE
                    loja_id = :loja_id
            ;');
        $statement->bindParam(':loja_id', $lojaId, \PDO::PARAM_INT);
        $statement->execute();
        $produtos = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $produtos;
    }

    public function insertProduto($produto): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO produtos VALUES(
                null,
                :loja_id,
                :nome,
                :preco,
                :quantidade
            );');
        $statement->execute([
            'loja_id' => $produto->getLojaId(),
            'nome' => $produto->getNome(),
            'preco' => $produto->getPreco(),
            'quantidade' => $produto->getQuantidade()
        ]);
    }

    public function updateProduto(ProdutoModel $produto): void
    {

        $statement = $this->pdo
            ->prepare('UPDATE produtos SET 
                    loja_id = :loja_id,
                    nome = :nome,
                    preco = :preco,
                    quantidade = :quantidade
                WHERE
                    id = :id
            ;');
        $statement->execute([
            'loja_id' => $produto->getLojaId(),
            'nome' => $produto->getNome(),
            'preco' => $produto->getPreco(),
            'quantidade' => $produto->getQuantidade(),
            'id' => $produto->getid()
        ]);
    }

    public function deleteProduto(int $id): void
    {
     
        $statement = $this->pdo
            ->prepare('DELETE FROM produtos WHERE id = :id;
            ');
        $statement->execute([
            'id' => $id
        ]);
    }

}
