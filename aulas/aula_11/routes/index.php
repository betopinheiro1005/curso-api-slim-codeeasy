<?php

use function src\{
    slimConfiguration,
    basicAuth,
    jwtAuth
};

use App\Controllers\{
    ProdutoController,
    LojaController,
    AuthController,
    ExceptionController
};

use Tuupola\Middleware\JwtAuthentication;
use App\Middlewares\JwtDateTimeMiddleware;

$app = new \Slim\App(slimConfiguration());

// =========================================

$app->get('/exception-test', ExceptionController::class . ':test');

$app->post('/login', AuthController::class . ':login');
$app->post('/refresh-token', AuthController::class . ':refreshToken');

$app->get('/teste', function(){echo "oi";})
    ->add((new JwtDateTimeMiddleware()))
    ->add(jwtAuth());

$app->group('', function () use ($app) {
    $app->get('/loja', LojaController::class . ':getLojas');
    $app->post('/loja', LojaController::class . ':insertLoja');
    $app->put('/loja', LojaController::class . ':updateLoja');
    $app->delete('/loja', LojaController::class . ':deleteLoja');

    $app->get('/produto', ProdutoController::class . ':getProdutos');
    $app->post('/produto', ProdutoController::class . ':insertProduto');
    $app->put('/produto', ProdutoController::class . ':updateProduto');
    $app->delete('/produto', ProdutoController::class . ':deleteProduto');
})->add(basicAuth());

// =========================================

$app->run();
