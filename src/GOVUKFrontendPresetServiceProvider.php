<?php

namespace CabinetOffice\Laravel\GOVUKFrontendPreset;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class GOVUKFrontendPresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        UiCommand::macro('govuk', function ($command) {
            GOVUKFrontendPreset::install();
            $command->info('GOV.UK Frontend scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        UiCommand::macro('govuk-auth', function ($command) {
            GOVUKFrontendPreset::install(true);
            $command->info('GOV.UK Frontend scaffolding with auth views installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
