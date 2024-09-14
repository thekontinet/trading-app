<?php

namespace App\Http\Controllers;

use App\Enums\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    public function __invoke(Request $request, ?string $slug = null)
    {
        $pages = Page::query()
            ->where('category', Category::PAGE)
            ->whereNotIn('slug', ['home', 'about', 'faq'])
            ->get();
        $page = Page::query()->where('slug', $slug)->first();
        $viewData = [
            'pages' => $pages,
        ];

        if($request->is('/')){
            return view('welcome', $viewData);
        }

        if($page){
            return view('page', [
                ...$viewData,
                'page' => $page,
            ]);
        }

        if(view()->exists("page.$slug")){
            return view("page.$slug", $viewData);
        }

        throw new NotFoundHttpException("Page not available");
    }
}
