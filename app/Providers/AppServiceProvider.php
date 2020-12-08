<?php

namespace App\Providers;

use App\Models\categories;
use App\Models\categories_detail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        //
        $Categories = new categories();
        $detail = new categories_detail();
        $categories_data = $Categories->GetCategories();
        $detail_data = $detail->GetCategoriesDetail();
        View::share(['categories' => $categories_data, "cate_detail" => $detail_data]);

    }
}
