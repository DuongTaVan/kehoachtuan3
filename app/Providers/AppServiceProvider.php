<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view)
        {
            if (Auth::check()) {
                $id = Auth::user()->id;
                //dd($id);
                $listRolesadmin = User::find($id)->role()->select('roles.name')->pluck('name')->toArray();
                //dd($listRolesadmin);
                view()->share('listRolesadmin',$listRolesadmin);
            }else {
                // $view->with('currentUser', null);
                dd(1);
            }
        });
    }
}
