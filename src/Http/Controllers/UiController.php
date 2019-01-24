<?php

namespace Noitran\Opendox\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Routing\Controller;

/**
 * Class UiController
 */
class UiController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $settings = config('opendox.documentation_source');
        $filePath = url('api-docs/' . $settings['filename'] . '.json');
        $version = config('opendox.frontend.redoc.version');

        return view('opendox::redoc.index', [
            'documentationFile' => $filePath,
            'redocVersion' => $version,
        ]);
    }
}
