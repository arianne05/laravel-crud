<?php

namespace App\Providers;

use App\Models\Students;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        //Global variable that can access in every page
        //          var name, value             //you can now access the var name by {{$title}} in all page
        View::share('title', 'Student System');

        //Access database in one go
        /*
        View::composer('students.index', function($view) {
            //var        tblname    modelname
            $view->with('students', Students::all()); //attach query using with //para rekta na may query and you can delete the query created in the controller
        });
         */
    }
}
