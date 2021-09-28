<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
    $app->post('/Authenticate', function ($request, $response, array $args) {
        $response->getBody()->write("435743097584925749");
        return $response;
    });
    $app->post('/CreateSalesOrder', function ($request, $response, array $args) {
        $payload = '{"Response": {"Status": "true", "Reason": "Success", "sap_order_number": "0004040321"}}';
        $response->getBody()->write($payload);
        return $response
                  ->withHeader('Content-Type', 'application/json');
    });
    $app->post('/AdvancePayment', function ($request, $response, array $args) {
        $payload = '{"Response": {"Status": "true","Message": "","AdvanceDocumentNumber": "2000193595"}}';
        $response->getBody()->write($payload);
        return $response
                  ->withHeader('Content-Type', 'application/json');
    });
    $app->post('/ReleaseSalesOrder', function ($request, $response, array $args) {
        $payload = '{"Response": {"Status": "true", "Reason": "Success", "sap_order_number": "0004040322"}}';
        $response->getBody()->write($payload);
        return $response
                  ->withHeader('Content-Type', 'application/json');
                  
    });
    $app->post('/CancelSalesOrder', function ($request, $response, array $args) {
        $payload = '{"Response": {"Status": "true","Reason": "Success","sap_order_number": "0004040322"}}';
        $response->getBody()->write($payload);
        return $response
                  ->withHeader('Content-Type', 'application/json');
                  
    });
    $app->post('/CreateSTO/[{status}]', function ($request, $response, array $args) {
        $status = $args['status'];
        $payload = json_encode([
            'Response' => 
                [
                    'Status'=> $status,
                    'Reason'=>'Success',
                    'sap_sto_order_number' => '0030284651'
                ]
        ]); 
        $response->getBody()->write($payload);
        return $response
                  ->withHeader('Content-Type', 'application/json');
                  
    });
    $app->post('/CheckSTO/[{status}]', function ($request, $response, array $args) {
        $status = $args['status'];
        $payload = json_encode([
            'Response' => 
                [
                    'Status'=> $status,
                    'Reason'=>'Success',
                    'sap_sto_order_number' => '0030284651'
                ]
        ]); 
        $response->getBody()->write($payload);
        return $response
                  ->withHeader('Content-Type', 'application/json');
                  
    });
    
};
