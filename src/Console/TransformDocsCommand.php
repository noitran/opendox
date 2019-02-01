<?php

namespace Noitran\Opendox\Console;

use Illuminate\Console\Command;
use Symfony\Component\Yaml\Yaml;

/**
 * Class TransformDocsCommand
 */
class TransformDocsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'opendox:transform';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transforms OpenAPI yaml file to json.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->info('Transforming yaml to json.');
        $settings = config('opendox.documentation_source');

        if ($settings['extension'] === 'json') {
            $this->info(
                'Documentation source file in opendox.php is set to "json". conversion will be skipped. Just copying...'
            );
        }

        $this->convert(
            $settings['path'],
            $settings['filename'],
            $settings['extension']
        );
    }

    /**
     * @param string $pathTo
     * @param string $fileName
     * @param string $fileExtension
     *
     * @return void
     */
    protected function convert(string $pathTo, string $fileName, string $fileExtension): void
    {
        $contents = $this->transform($pathTo . $fileName . '.' . $fileExtension);
        $saveToPath = config('opendox.documentation_source.save_to');

        if (! file_exists($saveToPath)) {
            mkdir($saveToPath);
        }

        $fullSaveToPath = $saveToPath . '/' . $fileName . '.json';

        file_put_contents($fullSaveToPath, $contents);
    }

    /**
     * @param string $pathToFile
     *
     * @return string
     */
    protected function transform(string $pathToFile): string
    {
        $contents = file_get_contents($pathToFile);
        $bag = Yaml::parse($contents);

        return json_encode($bag, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
