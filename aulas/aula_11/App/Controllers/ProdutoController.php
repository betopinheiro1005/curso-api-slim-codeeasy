<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\ProdutosDAO;
use App\Models\MySQL\CodeeasyGerenciadorDeLojas\ProdutoModel;

final class ProdutoController
{
    public function getProdutos(Request $request, Response $response, array $args): Response
    {
        $queryParams = $request->getQueryParams();

        $produtosDAO = new ProdutosDAO();
        $id = (int)$queryParams['loja_id'];
        $produtos = $produtosDAO->getAllProdutosFromLoja($id);
        $response = $response->withJson($produtos);

        return $response;
    }

    public function insertProduto(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $produtosDAO = new ProdutosDAO();
        $produto = new ProdutoModel();
        $produto->setLojaId($data['loja_id']);
        $produto->setNome($data['nome']);
        $produto->setPreco($data['preco']);
        $produto->setQuantidade($data['quantidade']);

        $produtosDAO->insertProduto($produto);

        $response = $response->withJson([
            'message' => 'Produto inserido com sucesso!'
        ]);

        return $response;
    }

    public function updateProduto(Request $request, Response $response, array $args): Response
    {
     
        $queryParams = $request->getQueryParams();
        $data = $request->getParsedBody();

        $id = (int)$queryParams['id'];

        $produtosDAO = new ProdutosDAO();
        $produto = new ProdutoModel();
        $produto->setId($id)
            ->setLojaId($data['loja_id'])
            ->setNome($data['nome'])
            ->setPreco($data['preco'])
            ->setQuantidade($data['quantidade']);
   
        $produtosDAO->updateProduto($produto);

        $response = $response->withJson([
            'message' => 'Produto atualizado com sucesso!'
        ]);

        return $response;        

    }

    public function deleteProduto(Request $request, Response $response, array $args): Response
    {

        $queryParams = $request->getQueryParams();

        $produtosDAO = new ProdutosDAO();
        $id = (int)$queryParams['id'];

        $produtosDAO->deleteProduto($id);

        $response = $response->withJson([
            'message' => 'Produto excluiído com sucesso!'
        ]);

        return $response;

    }
}
