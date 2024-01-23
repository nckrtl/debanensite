<?php

namespace NckRtl\DeBanensite\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use NckRtl\DeBanensite\DeBanensiteServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'NckRtl\\DeBanensite\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            DeBanensiteServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_debanensite_table.php.stub';
        $migration->up();
        */
    }
}
