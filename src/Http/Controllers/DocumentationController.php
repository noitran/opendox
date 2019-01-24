<?php

namespace Noitran\Opendox\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

/**
 * Class DocumentationController
 */
class DocumentationController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $settings = config('opendox.documentation_source');
        $filePath = $settings['save_to'] . '/' . $settings['filename'] . '.json';

        if (! file_exists($filePath)) {
            abort(404, 'Cannot find ' . $filePath);
        }

        $content = json_decode(
            file_get_contents($filePath)
        );

        return response()->json($content);
    }
}
