<?php

namespace MTN\StatamicBookable\Commands;

use Illuminate\Console\Command;
use Statamic\Console\RunsInPlease;

class BookableSetup extends Command
{
    use RunsInPlease;

    protected $signature = 'bookable:setup';
    protected $description = 'Run to setup Statamic Bookable on first try.';

    function handle() {

        $this->info(<<<'EOD'
        ::::::::::......::::::..:::::..:::::..:::::..:::::..:::::::::::.:::::::::::::::::
            ___       ___       ___       ___       ___       ___       ___       ___
           /\  \     /\  \     /\  \     /\__\     /\  \     /\  \     /\__\     /\  \
          /::\  \   /::\  \   /::\  \   /:/ _/_   /::\  \   /::\  \   /:/  /    /::\  \
         /::\:\__\ /:/\:\__\ /:/\:\__\ /::-"\__\ /::\:\__\ /::\:\__\ /:/__/    /::\:\__\
         \:\::/  / \:\/:/  / \:\/:/  / \;:;-",-" \/\::/  / \:\::/  / \:\  \    \:\:\/  /
          \::/  /   \::/  /   \::/  /   |:|  |     /:/  /   \::/  /   \:\__\    \:\/  /
           \/__/     \/__/     \/__/     \|__|     \/__/     \/__/     \/__/     \/__/
        :::::::::........::::.......::::.......:::..::::..::..:::::::::.:::::::::::::::::
        EOD);

        $this->info('');
        $this->info('Thank you for trying Bookable!');
        $this->confirm('Should we get started?');
    }
}
