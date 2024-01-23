<?php

namespace NckRtl\DeBanensite\Commands;

use Illuminate\Console\Command;

class DeBanensiteCommand extends Command
{
    public $signature = 'debanensite';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
