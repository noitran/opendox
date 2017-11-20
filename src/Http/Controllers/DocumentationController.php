<?php

namespace Iocaste\Laradox\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class DocumentationController
 */
class DocumentationController extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $settings = config('laradox.documentation_source');
        $filePath = $settings['save_to'] . '/' . $settings['filename'] . '.json';

        if (! file_exists($filePath)) {
            abort(404, 'Cannot find '.$filePath);
        }

        $content = json_decode(
            file_get_contents($filePath)
        );

        return response()->json($content);
    }
}
