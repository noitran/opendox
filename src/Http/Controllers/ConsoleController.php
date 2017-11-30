<?php

namespace Iocaste\Laradox\Http\Controllers;

use Illuminate\View\View;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class ConsoleController
 */
class ConsoleController extends BaseController
{
    /**
     * @return View
     */
    public function index(): View
    {
        $settings = config('laradox.documentation_source');
        $filePath = url('api-docs/' . $settings['filename'] . '.json');

        return view('laradox::swagger.index', [
            'documentationFile' => $filePath,
        ]);
    }
}
