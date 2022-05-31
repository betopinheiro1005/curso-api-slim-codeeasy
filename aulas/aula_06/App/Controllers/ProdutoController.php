<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ProdutoController
{
    public function getProdutos(Request $request, Response $response, array $args): Response
    {
        // $response->getBody()->write("Hello World!");

        $response = $response->withJson([
            "message" => "Hello World"
        ]);

        return $response;
    
    }

}
