<?php
// Routes

$app->get('/', App\Controller\MagazineController::class)
->setName('homepage');
$app->post('/magazyn', App\Controller\MagazineController::class.':addMagazine');
$app->get('/magazyn', App\Controller\MagazineController::class.':showAllMagazines');
$app->get('/magazyn/{id}', App\Controller\MagazineController::class.':showMagazine');
