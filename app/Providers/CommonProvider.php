<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;
class CommonProvider extends ServiceProvider
{
  
    public function register()
    {
        
    }

 
    public function boot()
    {
        $categories=Category::all();
        View::share("_Categories",$categories);
    }
}
