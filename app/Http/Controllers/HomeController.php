<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Category;
class HomeController extends Controller
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::with([
            'hotProducts' => function ($query) {
                $query->take(4);
            }
        ])->get();

        return view("pages.index", ["categories" => $categories]);
    }

    public function about(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view("pages.about");
    }
    public function contact(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view("pages.contact");
    }
}
