<?php

namespace Noitran\Opendox\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Routing\Controller;

/**
 * Class ConsoleController
 */
class ConsoleController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $settings = config('opendox.documentation_source');
        $filePath = url('api-docs/' . $settings['filename'] . '.json');
        $version = config('opendox.frontend.swagger.version');

        return view('opendox::swagger.index', [
            'documentationFile' => $filePath,
            'swaggerVersion' => $version,
        ]);
    }
}
