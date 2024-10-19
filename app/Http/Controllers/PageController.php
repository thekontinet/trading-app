<?php

namespace App\Http\Controllers;

use App\Enums\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    public function __invoke(Request $request, ?string $slug = null)
    {
        $namespace = env('APP_THEME') ? env('APP_THEME') . '::' : '';
        $page = Page::query()->where('slug', $slug)->first();
        $viewData = [
            'navitems' => $this->getNavItems(),
            'title' => $page?->title,
            'page' => $page,
        ];

        $view = match(true){
            !is_null($page) => 'page',
            $request->is('/') => 'welcome',
            default => ''
        };

        if(view()->exists($view)){
            return view($namespace . $view, $viewData);
        }else{
            $viewData['title'] = Str::of($slug)->replace( '-', ' ')->title();
            return view($namespace . 'coming-soon', $viewData);
        }
    }

    private function getNavItems(): array
    {
        return Page::query()
            ->where('category', Category::PAGE)
            ->whereNotIn('slug', ['home', 'about', 'faq'])
            ->get()->map(fn($page) => [
                'title' => $page->title,
                'href' => route('pages', $page),
            ])->toArray();
    }
}
