<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class PandoraController extends Controller
{
    public function index()
    {
        $response['status'] = 'ok';

        if (!App::environment('production')) {
            $response['laravel_version'] = Application::VERSION;
            $response['php_version'] = PHP_VERSION;
            $response['pandora_version'] = Config::get('pandora.version');
        }

        return Response::json($response);
    }
}
