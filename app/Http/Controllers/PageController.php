<?php

namespace App\Http\Controllers;

use App\Enums\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
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
            'appName' => env('APP_NAME'),
        ];

        $view = match(true){
            !is_null($page) => 'page',
            $request->is('/') => 'welcome',
            default => 'page.' . $slug
        };

        if(view()->exists($namespace . $view)){
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

    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'max:1000'],
        ]);

        Mail::raw($request->message, function ($message) use ($request) {
            $message->to(env('MAIL_FROM_ADDRESS'))
                ->subject('Contact Message');
            $message->from($request->email, $request->name);
        });

        return redirect()->back()->with('mail.success', 'Thanks for contacting us!');
    }
}
