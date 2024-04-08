<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('max_mb', function($attribute, $value, $parameters, $validator) {
            $this->requireParameterCount(1, $parameters, 'max_mb');

            if ($value instanceof UploadedFile && ! $value->isValid()) {
                return false;
            }

            // If call getSize()/1024/1024 on $value here it'll be numeric and not
            // get divided by 1024 once in the Validator::getSize() method.

            $megabytes = $value->getSize() / 1024 / 1024;

            return $this->getSize($attribute, $megabytes) <= $parameters[0];
        });
    }
}
