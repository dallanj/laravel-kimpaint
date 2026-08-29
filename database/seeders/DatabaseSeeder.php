<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\NavigationMenu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'demo@example.com'],
            [
                'name' => 'Demo Administrator',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $category = Category::firstOrCreate(
            ['slug' => 'projects'],
            ['name' => 'Projects']
        );

        Page::firstOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Home',
                'content' => '<p>Professional painting services for homes and businesses.</p>',
                'is_default_home' => true,
                'is_default_not_found' => false,
            ]
        );

        Page::firstOrCreate(
            ['slug' => 'page-not-found'],
            [
                'title' => 'Page not found',
                'content' => '<p>The page you requested could not be found.</p>',
                'is_default_home' => false,
                'is_default_not_found' => true,
            ]
        );

        NavigationMenu::firstOrCreate(
            ['slug' => 'contact-us'],
            ['label' => 'Contact', 'sequence' => 1, 'type' => 'Menu', 'menuid' => null]
        );

        Post::firstOrCreate(
            ['slug' => 'welcome-to-the-project-gallery'],
            [
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => 'Welcome to the project gallery',
                'excerpt' => '<p>A sample project entry for the local demo.</p>',
                'body' => '<p>Use the dashboard to replace this post with your own project story.</p>',
                'published_at' => now(),
            ]
        );

        Testimonial::firstOrCreate(
            ['author' => 'Sample customer'],
            ['testimonial' => 'Professional, tidy, and easy to work with.']
        );
    }
}
