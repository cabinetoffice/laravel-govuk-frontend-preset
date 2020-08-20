<?php

namespace CabinetOffice\Laravel\GOVUKFrontendPreset;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\Preset;

class GOVUKFrontendPreset extends Preset
{

    public static function install($withAuth = false)
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateStyles();
        static::updateScripts();
        static::updateHtml5Shiv();
        static::updateMix();

        if ($withAuth) {
            static::addAuthTemplates();
        } else {
            static::updateWelcomePage();
        }

        static::removeNodeModules();
    }


    protected static function updatePackageArray($packages)
    {
        return array_merge(['govuk-frontend' => '~3.81'],
            Arr::except($packages, [
                'popper.js',
                'lodash',
                'jquery'
            ])
        );
    }


    protected static function updateStyles()
    {
        File::cleanDirectory(resource_path('assets/sass')); //old directory format
        File::cleanDirectory(resource_path('sass'));

        copy(__DIR__ . '/stubs/sass/app.scss', resource_path('sass/app.scss'));
        copy(__DIR__ . '/stubs/sass/app-ie8.scss', resource_path('sass/app-ie8.scss'));
    }


    public static function updateScripts()
    {

        File::cleanDirectory(resource_path('assets/js')); //old directory format
        File::cleanDirectory(resource_path('js'));

        copy(__DIR__ . '/stubs/js/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/stubs/js/bootstrap.js', resource_path('js/bootstrap.js'));
    }


    public static function updateHtml5Shiv()
    {
        if (!File::isDirectory(resource_path('js/html5shiv'))) {
            File::makeDirectory(resource_path('js/html5shiv'));
        }

        copy(__DIR__ . '/vendors/html5shiv/dist/html5shiv.min.js', resource_path('js/html5shiv/html5shiv.min.js'));
        copy(__DIR__ . '/vendors/html5shiv/dist/html5shiv-printshiv.min.js', resource_path('js/html5shiv/html5shiv-printshiv.min.js'));
    }


    protected static function updateMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }


    protected static function updateWelcomePage()
    {
        File::delete(resource_path('views/welcome.blade.php'));
        if (!File::isDirectory(resource_path('views/layouts'))) {
            File::makeDirectory(resource_path('views/layouts'));
        }
        File::copyDirectory(__DIR__ . '/stubs/views/partials', resource_path('views/partials'));
        copy(__DIR__ . '/stubs/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
        copy(__DIR__ . '/stubs/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }


    protected static function addAuthTemplates()
    {
        copy(__DIR__ . '/stubs/Controllers/HomeController.php', app_path('Http/Controllers/HomeController.php'));

        $authRouteEntries = "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n";
        file_put_contents('./routes/web.php', $authRouteEntries, FILE_APPEND);

        File::copyDirectory(__DIR__ . '/stubs/views', resource_path('views'));
    }

}
