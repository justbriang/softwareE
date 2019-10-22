<?php
namespace App\Providers;
use App\Category;
use Illuminate\Support\ServiceProvider;

class DynamicCategoryName extends ServiceProvider{
    public function boot(){
        view()->composer('*', function ($view) {
            $view->with('classname_array', Category::all());
        });
    }
}
