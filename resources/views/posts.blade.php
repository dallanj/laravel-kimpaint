<x-layout>

    @include ('_nav-menu')
    
    @include ('_blog-header')

    <main>
        <div class="max-w-7xl mx-auto p-4 py-6 sm:px-6 lg:px-8">
            
            <!-- category list -->
            <aside class="mb-6">
                <ul class="flex gap-2 flex-wrap body-text text-sm">
                    @if (isset($currentCategory))
                        <a href="../posts">
                            <li 
                            class="category-tab-bg p-1 rounded-md drop-shadow-lg category-tab-bg-notactive"
                            >
                                <strong>SHOW ALL</strong>       
                            </li>
                        </a>
                    @else
                        <li 
                        class="category-tab-bg p-1 rounded-md drop-shadow-lg category-tab-bg-active"
                        >   
                            <strong>SHOW ALL</strong>       
                        </li>
                    @endif
                    
                    @foreach ($categories as $category)
  

                        @if (isset($currentCategory) && $currentCategory->name == $category->name)
                            <li 
                            class="category-tab-bg p-1 rounded-md drop-shadow-lg category-tab-bg-active"
                            >   
                                <strong>{{ strtoupper($category->name) }}</strong>       
                            </li>
                        @else
                            <a href="/categories/{{ $category->slug }}">
                                <li 
                                class="category-tab-bg p-1 rounded-md drop-shadow-lg category-tab-bg-notactive"
                                >
                                    <strong>{{ strtoupper($category->name) }}</strong>       
                                </li>
                            </a>
                        @endif
                    @endforeach
                </ul>
            </aside>

            <div class="flex">
                <div class="form-floating mb-3 xl:w-96 body-text">
                    <form method="GET" action="#">
                        <label for="search" class="sr-only">Search for blog posts</label>
                        <input 
                            name="search"
                            type="text" 
                            class="form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="search" 
                                placeholder="Search blog posts"
                                value="{{ request('search') }}"
                            >
                    </form>
                </div>
            </div>

            @if ($posts->count())
                @foreach($posts as $post)
                <article class="{{ $loop->even ? 'bg-gray' : '' }} body-text">  

                    <!-- date -->
                    <p class="blog-posts-date">
                        <a href="/posts/{{ $post->slug }}">
                            {{ date('F d, Y', strtotime($post->created_at)) }}
                            &#8226;
                            {{ $post->created_at->diffForHumans() }}
                        </a>
                    </p>
                    
                    <!-- title -->
                    <h2 class="blog-posts-title">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <!-- author/category -->
                    <p class="blog-posts-author">
                        By
                        <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                        in
                        <a href="/categories/{{ $post->category->slug }}">
                            {{ $post->category->name }}
                        </a>
                    </p>

                    <!-- body -->
                    <div class="blog-posts-excerpt">{!! $post->excerpt !!}</div>

                </article> 
                @endforeach
            @else
                <p>There aren't any blog posts yet!</p>
            @endif

        </div>
    </main>
    <script src="./js/slider.js"></script>
</x-layout>