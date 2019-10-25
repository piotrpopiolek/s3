<?php

namespace App\Controller;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class MagazineController
{
    private $view;
    private $logger;

    public function __construct(Twig $view, LoggerInterface $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->logger->info("Magazine Controller :__invoke");

        $this->view->render($response, 'home.twig');
        return $response;
    }

    public function showMagazine(Request $request, Response $response, $args)
    {

        $this->logger->info("Magazine Controller :showMagazine");

        return "ShowMagazine";
    }

    public function showAllMagazines(Request $request, Response $response, $args)
    {

        $this->logger->info("Magazine Controller :showAllMagazine");

        return "showAllMagazines";
    }

    public function addMagazine(Request $request, Response $response, $args)
    {

        $this->logger->info("Magazine Controller :addMagazine");

        $data = $request->getParsedBody();

        var_dump($data);

        $magazine['name'] = $data['name'];
        $magazine['description'] = $data['description'];
        $magazine['index'] = $data['index'];
        $magazine['barcode'] = $data['barcode'];
        $magazine['client'] = $data['client'];
        $magazine['status'] = $data['status'];

        $response->withHeader('Content-Type', 'application/json; charset=utf-8')->withHeader('Access-Control-Allow-Origin', '*');
        $response->write(json_encode($magazine));

        return $response;
    }
}
