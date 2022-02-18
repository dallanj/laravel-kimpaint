<x-layout>

    @include ('_nav-menu')

    <main class="p-4 sm:p-0">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            
            <a class="bread-crumb" href="/blog">< BACK TO BLOG</a>

            <article class="post-container">

                <h1 class="text-5xl font-bold text-gray-900 pb-6">{{ $post->title }}</h1>

                <p class="blog-posts-author">
                    By
                    <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                    in 
                    <a href="/categories/{{ $post->category->slug }}">
                        {{ $post->category->name }}
                    </a>
                    on
                    {{ date('F d, Y', strtotime($post->created_at)) }}
                </p>

                <div>
                    {!! $post->body !!}
                </div>
            </article>

        </div>
    </main>
</x-layout>