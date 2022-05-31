<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$configuration = new \Slim\Container($configuration);

$mid01 = function(Request $request, Response $response, $next): Response{
	$response->getBody()->write("Dentro do middleware 01");
	$response = $next($request, $response);	
	$response->getBody()->write("Dentro do middleware 02");

	return $response;
};

$app = new \Slim\App($c);

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Bem-vindo ao Slim!");
    return $response;
});

$app->get('/produtos[/{nome}]', function (Request $request, Response $response, array $args) {
    $limit = $request->getQueryParams()['limit'] ?? 10;
    $nome = $args['nome'] ?? 'mouse';
    $response->getBody()->write("{$limit} Produtos do banco de dados com o nome {$nome}");
    return $response;
});

// $app->post('/produto', function (Request $request, Response $response, array $args) {
//     $data = $request->getParsedBody();

//     print_r($data);
//     die;

//     return $response->getBody()->write("Id: {$id} - Produto {$nome}");
// });

$app->post('/produto', function (Request $request, Response $response, array $args): Response {
    $data = $request->getParsedBody();

    $id = $data['id'] ?? '';
    $nome = $data['nome'] ?? '';

    $data['message'] = "Produto inserido com sucesso!";
    
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
})->add($mid01);

$app->put('/produto/{id}', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    $data['id'] = $args['id'];
    $data['message'] = "Produto atualizado com sucesso!";

    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->delete('/produto/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];

    $data['id'] = $id;
    $data['message'] = "Produto excluído com sucesso!";

    $response->getBody()->write(json_encode($data));
});

$app->run();