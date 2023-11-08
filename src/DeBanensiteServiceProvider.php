<?php

namespace Nckrtl\DeBanensite;

use Nckrtl\DeBanensite\Commands\DeBanensiteCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DeBanensiteServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('debanensite')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_debanensite_table')
            ->hasCommand(DeBanensiteCommand::class);
    }
}
