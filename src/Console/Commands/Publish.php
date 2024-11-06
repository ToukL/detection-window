<?php

namespace Biigle\Modules\DetectionWindow\Console\Commands;

use Biigle\Modules\DetectionWindow\DetectionWindowServiceProvider as ServiceProvider;
use Illuminate\Console\Command;

class Publish extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'DetectionWindow:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish or refresh the public assets of this package';

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', [
            '--provider' => ServiceProvider::class,
            '--tag' => ['public'],
            '--force' => true,
        ]);
    }
}
