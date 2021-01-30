<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'v1'], function () use ($router) {

    $router->get('/quotes', function () {
        return response()->json([
            'data' => app('db')->select("SELECT id, title, slug FROM quotes")
        ]);
    });

    $router->get('/quotes/{id:[\d]+}', function ($id) {
        return response()->json([
            'data' => app('db')->select("SELECT * FROM quotes WHERE id = $id")
        ]);
    });

    $router->delete('/quotes/{id:[\d]+}', function ($id) {
        app('db')->select("DELETE FROM quotes WHERE id = $id");
        return response()->json([
            'message' => 'Quote deleted'
        ], 204);
    });
});

$router->group(['prefix' => 'v2'], function () use ($router) {

    $router->get('/quotes', function () {
        return response()->json([
            'data' => app('db')->select(
                "SELECT quotes.id, quotes.title, quotes.slug, quotes.updated_at,
                 quotes.author_id, authors.name AS author_name
                FROM quotes INNER JOIN authors ON quotes.author_id = authors.id
                ORDER BY quotes.updated_at"
            )
        ]);
    });

    $router->get('/quotes/{id:[\d]+}', function ($id) {
        $response = app('db')->select(
            "SELECT id, title, slug, content, updated_at 
            FROM quotes WHERE id = $id"
        );

        if ($response == [])
            return response()->json(['data' => []]);

        $response[0]->author = app('db')->select(
            "SELECT id, name, last_name FROM authors 
            WHERE id = {intval({$response[0]->id})}"
        )[0];

        return response()->json(['data' => $response[0]]);
    });

    $router->delete('/quotes/{id:[\d]+}', function ($id) {
        app('db')->select("DELETE FROM quotes WHERE id = $id");
        return response()->json([
            'message' => 'Quote deleted'
        ], 204);
    });
});
