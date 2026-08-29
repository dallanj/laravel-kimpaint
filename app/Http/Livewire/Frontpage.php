<?php

namespace App\Http\Livewire;

use App\Models\NavigationMenu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Testimonial;
use Livewire\Component;

class Frontpage extends Component
{
    public $title;
    public $content;

    public function mount(?string $urlslug = null): void
    {
        $page = $urlslug
            ? Page::where('slug', $urlslug)->first()
            : Page::where('is_default_home', true)->first();

        $page = $page ?: Page::where('is_default_not_found', true)->first();

        abort_unless($page, 404);

        $this->title = $page->title;
        $this->content = $page->content;
    }

    public function render()
    {
        return view('livewire.frontpage', [
            'menuLinks' => NavigationMenu::where('type', 'Menu')
                ->orderBy('sequence')
                ->oldest()
                ->get(),
            'subMenuLinks' => NavigationMenu::where('type', 'SubMenu')
                ->orderBy('menuid')
                ->orderBy('sequence')
                ->oldest()
                ->get(),
            'recentBlogs' => Post::latest()->limit(4)->get(),
            'testimonials' => Testimonial::latest()->get(),
        ])->layout('layouts.frontpage');
    }
}
