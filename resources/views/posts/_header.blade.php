<header class="bg-white">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl font-bold text-gray-900 body-text">
         
            @if (Request::is('posts/*'))
                {{ $post->title }}
            @elseif (Request::is('posts'))
                All Posts
            @elseif (Request::is('contact-us'))
                Contact Us
            @endif
        </h1>
    </div>
</header>