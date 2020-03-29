<?php

namespace CabinetOffice\Laravel\GOVUKFrontendPreset\Tests;


use Laravel\Ui\UiServiceProvider;
use CabinetOffice\Laravel\GOVUKFrontendPreset\GOVUKFrontendPresetServiceProvider;

class GOVUKFrontendPresetTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            UiServiceProvider::class,
            GOVUKFrontendPresetServiceProvider::class,
        ];
    }


    public function test_basic_install_command()
    {
        $this->withoutMockingConsoleOutput();

        $this->artisan('ui govuk');

        $this->assertFileExists(resource_path('js/app.js'));

        $this->assertFileExists(resource_path('views/welcome.blade.php'));
    }


    public function test_basic_with_auth_install_command()
    {
        $this->withoutMockingConsoleOutput();

        $this->artisan('ui govuk-auth');

        $this->assertFileExists(resource_path('js/app.js'));

        $this->assertFileExists(resource_path('views/auth/login.blade.php'));
    }
}
