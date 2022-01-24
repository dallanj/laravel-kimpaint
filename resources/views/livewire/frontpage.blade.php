<!-- <div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    full page livewire component
    <p>Current slug is {{ $urlslug }}</p>
    <p>Current title is {{ $title }}</p>
    <p>Current content is {!! $content !!}</p>
</div> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- <header class="headerFixed hidden">
  <h1 class="logo-text"><strong>KIMPAINT</strong></h1>
</header> -->

<div class="relative bg-white overflow-hidden">
  <div class="headerFixedBg hidden"></div>
  <div class="max-w-7xl mx-auto">
    <div class="relative z-20 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>

      <div class="header" x-data="{ open: false, onPageLoad:false }">
        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
          <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
              <div class="flex items-center justify-between w-full md:w-auto">
                <a href="#">
                  <span class="sr-only">Workflow</span>
                  <!-- <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"> -->
                  <h1 class="logo-text"><strong>KIMPAINT</strong></h1>
                </a>
                <div class="-mr-2 flex items-center md:hidden">
                  <button id="openNavMenu" @click.prevent="open = !open, onPageLoad = true" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 navButton hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <!-- desktp nav menu -->
            <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
              @foreach ($menuLinks as $link)

                @php
                  $hasSubLinks = false;
                @endphp
                @foreach ($subMenuLinks as $subLink)
                    @if ($subLink->menuid == $link->id)
                      @php $hasSubLinks = true; @endphp
                    @endif
                @endforeach

                <span class="pb-3" x-data="{ open{{ $link->id }}: false, PageLoad{{ $link->id }}: true }" @mouseleave="open{{ $link->id }} = false">
                  @if ($hasSubLinks)
                    <button class="navMenu-link-desktop" @mouseover="PageLoad{{ $link->id }} = false, open{{ $link->id }} = true" class="font-medium navMenu-link-desktop">{{ $link->label }}
                      <i :class="{ 'hide': open{{ $link->id }} === true }" class="ml-2 fas fa-angle-down text-gray-400 hover:text-gray-500"></i>
                      <i :class="{ 'hide': open{{ $link->id }} === false }" class="ml-2 fas fa-angle-up text-gray-400 hover:text-gray-500"></i>
                    </button>
                  @else
                    <a href="{{ url('/'.$link->slug) }}" class="font-medium navMenu-link-desktop">{{ $link->label }}</a>
                  @endif
                
                @if ($hasSubLinks)
                  <div x-show="open{{ $link->id }}" :class="{ 'hide': PageLoad{{ $link->id }}, 'hideSubMenu': open{{ $link->id }} === false, 'showSubMenu': open{{ $link->id }} === true }" class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                      <div class="relative grid gap-6 bg-white px-5 py-6">
    

                        @foreach ($subMenuLinks as $subLink)
                          @if ($subLink->menuid == $link->id)
                            <a href="{{ url('/'.$subLink->slug) }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                              <div class="ml-4">
                                <p class="text-base font-medium text-gray-900">
                                  {{ $subLink->label }}
                                </p>
                              </div>
                            </a>
                          @endif
                        @endforeach

                      </div>
                    </div>
                  </div>
                @endif
                </span>
              @endforeach        
            </div>
          </nav>
        </div>

        <!--
          Mobile menu, show/hide based on menu open state.

          Entering: "duration-150 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
          Leaving: "duration-100 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
        <div :class="{ 'hide': !onPageLoad, 'hideMenu': !open, 'showMenu': open }" class="hide navMenu absolute z-20 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
          <!-- <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden"> -->
            <div class="px-5 pt-4 flex items-center justify-between">
              <div>
                <!-- <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt=""> -->
                <h1 class="logo-text"><strong>KIMPAINT</strong></h1>
              </div>
              <div class="-mr-2">
                <button id="closeNavMenu" @click.prevent="open = !open" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 navButton hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                  <span class="sr-only">Close main menu</span>
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="navMenu-links px-2 pt-2 pb-3 space-y-1">
              @foreach ($menuLinks as $link)
                <!-- check if menu link contains submenu links -->
                @php
                  $hasSubLinks = false;
                @endphp
                @foreach ($subMenuLinks as $subLink)
                    @if ($subLink->menuid == $link->id)
                      @php $hasSubLinks = true; @endphp
                    @endif
                @endforeach

                <!-- also need to remove the link if it contains sublinks and add js to toggle the submenu -->

                <div class="navMenu-link-container" x-data="{ open{{ $link->id }}: false, PageLoad{{ $link->id }}: true}">
                  @if ($hasSubLinks)
                    
                    <a @click.prevent="PageLoad{{ $link->id }} = false, open{{ $link->id }} = !open{{ $link->id }}" class="navMenu-link block"><span :class="{ 'active': open{{ $link->id }} }" class="menuLinkStyle">{{ $link->label }}</span>
                      <i :class="{ 'hide': open{{ $link->id }} }" class="fas fa-angle-right text-gray-400 hover:text-gray-500"></i>
                      <i :class="{ 'hide': !open{{ $link->id }}, 'active': open{{ $link->id }} }" class="fas fa-angle-down text-gray-400 hover:text-gray-500"></i>
                    </a>

                  @else
                    <a href="{{ url('/'.$link->slug) }}" class="navMenu-link block"><span class="menuLinkStyle">{{ $link->label }}</span></a>
                  @endif
                  @if ($hasSubLinks)
                    <div class="subMenu-container" :class="{ 'hide': PageLoad{{ $link->id }}, 'hideSubMenu': !open{{ $link->id }}, 'showSubMenu': open{{ $link->id }} }">
                      @foreach ($subMenuLinks as $subLink)
                        @if ($subLink->menuid == $link->id)
                          <a href="{{ url('/'.$subLink->slug) }}" class="navMenu-subLink block">{{ $subLink->label }}</a>
                        @endif
                      @endforeach
                    </div>
                  @endif
                </div>
              @endforeach
            </div>
           
            <div class="mt-5 sm:mt-8 flex justify-center justify-start">
              <div class="rounded-md shadow">
                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange md:py-4 md:text-lg md:px-10">
                  Call or text 905-351-7947
                </a>
              </div>
            </div>

            <footer class="mt-5 menuFooter">
              <p>© 2022 Kim Painting. All rights reserved.</p>
              <p>Built by <a href="https://dallan.ca/">Dallan</a><p>
            </footer>
          </div>

         
        <!-- </div> -->
      </div>
    
      <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
          <h1 class="hero-title text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="fadeIn delay-1 block xl:inline">A fresh coat,</span>
            <span class="fadeIn delay-2 slideInRight block text-orange xl:inline">for a fresh start</span>
          </h1>
          <p class="body-text mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.
          </p>
          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="bounce rounded-md shadow">
              <a href="#" class="body-text w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange md:py-4 md:text-lg md:px-10">
                Get your free paint quote
              </a>
            </div>
            <!-- <div class="mt-3 sm:mt-0 sm:ml-3">
              <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                Live demo
              </a>
            </div> -->

          </div>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src=" {{ 'img/hero.png' }}" alt="">
  </div>
</div>


<!-- CTA -->
<div class="flex flex-col .bg-footer-bg relative bg-cta-beige overflow-hidden">
  <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:items-center lg:justify-between relative z-10">
    <h2 class="about-us-title text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">
      <span class="block">We're ready to paint</span>
      <span class="block text-orange">Across the entire Niagara region.</span>
    </h2>
    <div class="sm:justify-center mt-8 flex md:mt-8 lg:mt-12 lg:flex-shrink-0">
      <div class="inline-flex rounded-md shadow">
        <a href="#" class="body-text inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange">
          Call us now (905-351-7947)
        </a>
      </div>
      <div class="ml-3 inline-flex rounded-md shadow">
        <a href="#" class="body-text inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-orange bg-whitebutton">
          Email us
        </a>
      </div>
    </div>
  </div>
  <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f2ece4" fill-opacity="1" d="M0,224L80,218.7C160,213,320,203,480,218.7C640,235,800,277,960,250.7C1120,224,1280,128,1360,80L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
  </svg>
</div>

<!-- About us -->
<div class="py-12 bg-white body-text bg-footer-bg">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="">
      <h2 class="lg:text-center text-base text-orange font-semibold tracking-wide uppercase body-text">About us</h2>
      <p class="lg:text-center mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        This is who we are
      </p>
      <p class="mt-4 text-xl text-gray-500 lg:mx-auto">
      Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
      Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
      Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
      </p>
      <p class="mt-4 text-xl text-gray-500 lg:mx-auto">
        Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
        Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
      </p>
    </div>
  </div>
</div>




<!-- services -->
<div class="py-12 bg-white body-text">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <h2 class="text-base text-orange font-semibold tracking-wide uppercase body-text">Services</h2>
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        This is what we can do
      </p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
        Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
      </p>
    </div>

    <div class="mt-10">
      <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-orange text-white text-2xl">
              <i class="fas fa-home"></i>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Residential</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-orange text-2xl text-white">
              <i class="fas fa-building"></i>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Commercial</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-orange text-2xl text-white">
              <i class="fas fa-brush"></i>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Interior & exterior painting</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-orange text-2xl text-white">            
              <i class="fas fa-pencil-alt"></i>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Drywall</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-orange text-2xl text-white">       
              <i class="fas fa-hammer"></i>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Desk & fence installation</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-orange text-2xl text-white">            
              <i class="fas fa-bolt"></i>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Power washing & stain</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
          </dd>
        </div>
      </dl>
    </div>
  </div>
</div>

<!-- blogs and gallery -->
<div class="py-12 body-text bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <h2 class="text-base text-orange font-semibold tracking-wide uppercase body-text">Portfolio</h2>
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        Previous work and blogs
      </p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
        Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
      </p>
    </div>

    <!-- blogs -->
    <div class="mt-10 hidden md:block">
        <div class="relative grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-8">
          @foreach ($recentBlogs as $blog)
            <!-- blog post example -->
            <div class="portfolio-card">
              <a class="flex flex-col" href="{{ url('blogs/'.$blog->slug) }}">
              <!-- image -->
              <img class="portfolio-card-img" src=" {{ 'img/hero.png' }}" alt="Photo1"/>
              <p class="pt-4 portfolio-card-type">Blog</p>
              <!-- title -->
              <h2 class="portfolio-card-title">{{ $blog->title }}</h2>
              <!-- short description -->
              <p class="portfolio-card-desc">{!! \Illuminate\Support\Str::limit($blog->description, 50, '...') !!}</p>
              <!-- read more -->
              <p class="portfolio-card-end">
                  READ MORE
                  <i class="fas fa-angle-double-right"></i>
              </p>
              </a>
            </div>
          @endforeach
     
               

        </div>
    </div>

    <!-- slider images -->
    <div class="mt-10 md:hidden overflow-hidden">
      <div class="slider">

        <button class="btn-slide prev"><i class="fas fa-3x fa-chevron-left"></i></button>
        <button class="btn-slide next"><i class="fas fa-3x fa-chevron-right"></i></button>

        @foreach ($recentBlogs as $blog)
          <div class="slide">
            <!-- blog post example -->
            <div class="portfolio-card">
              <a href="{{ url('blogs/'.$blog->slug) }}">
              <!-- image -->
              <img class="portfolio-card-img" src=" {{ 'img/hero.png' }}" alt="Photo1"/>
              <p class="pt-4 portfolio-card-type">Blog</p>
              <!-- title -->
              <h2 class="portfolio-card-title">{{ $blog->title }}</h2>
              <!-- short description -->
              <p class="portfolio-card-desc">{!! \Illuminate\Support\Str::limit($blog->description, 50, '...') !!}</p>
              <!-- read more -->
              <p class="portfolio-card-end">
                  READ MORE
                  <i class="fas fa-angle-double-right"></i>
              </p>
              </a>
            </div>
          </div>
        @endforeach

      </div>
      <div class="dots-container mt-6">
          @for ($i = 0; $i < count($recentBlogs); $i++)
            <span class="dot" data-slide="@php echo $i;  @endphp"></span>
          @endfor
      </div>
    </div>

    <script src="./js/slider.js"></script>

  </div>
</div>

<!-- CTA -->
<div class="flex flex-col bg-cta-beige relative overflow-hidden">
  <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:items-center lg:justify-between position:relative z-10">
    <h2 class="about-us-title text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">
      <span class="block">How can we help you?</span>
      <span class="block text-orange">Book your free price quote.</span>
    </h2>
    <div class="sm:justify-center mt-8 flex md:mt-8 lg:mt-12 lg:flex-shrink-0">
      <div class="inline-flex rounded-md shadow">
        <a href="#" class="body-text inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange">
          Call us now (905-351-7947)
        </a>
      </div>
      <div class="ml-3 inline-flex rounded-md shadow">
        <a href="#" class="body-text inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-orange bg-whitebutton">
          Email us
        </a>
      </div>
    </div>
  </div>
  <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f2ece4" fill-opacity="1" d="M0,224L80,218.7C160,213,320,203,480,218.7C640,235,800,277,960,250.7C1120,224,1280,128,1360,80L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
  </svg>
</div>

<!-- contact us -->

<!-- footer -->
<footer class="hero-title text-center lg:text-left bg-footer-bg text-gray-600">
  <div class="max-w-7xl mx-auto flex justify-center items-center lg:justify-between p-6 border-b border-gray-300">
    <div class="mr-12 hidden lg:block">
      <span>Get connected with us on social networks:</span>
    </div>
    <div class="flex justify-center">
      <a href="#!" class="mr-6 text-gray-600">
        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f"
          class="w-2.5" role="img" xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 320 512">
          <path fill="currentColor"
            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
          </path>
        </svg>
      </a>
      <a href="#!" class="mr-6 text-gray-600">
        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter"
          class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor"
            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
          </path>
        </svg>
      </a>
      <a href="#!" class="mr-6 text-gray-600">
        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google"
          class="w-3.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512">
          <path fill="currentColor"
            d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
          </path>
        </svg>
      </a>
      <a href="#!" class="mr-6 text-gray-600">
        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram"
          class="w-3.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path fill="currentColor"
            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
          </path>
        </svg>
      </a>
      <a href="#!" class="mr-6 text-gray-600">
        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in"
          class="w-3.5" role="img" xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 448 512">
          <path fill="currentColor"
            d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
          </path>
        </svg>
      </a>
      <a href="#!" class="text-gray-600">
        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="github"
          class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
          <path fill="currentColor"
            d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
          </path>
        </svg>
      </a>
    </div>
  </div>
  <div class="max-w-7xl mx-auto py-10 p-6 text-center md:text-left">
    <div class="grid grid-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="">

          <h1 class="logo-text mb-3"><strong>KIMPAINT</strong></h1>
        
        <p>
          Here you can use rows and columns to organize your footer content. Lorem ipsum dolor
          sit amet, consectetur adipisicing elit.
        </p>
      </div>
      <div class="">
        <h6 class="uppercase font-semibold mb-4 flex justify-center md:justify-start">
          Sitemap
        </h6>
        @foreach ($menuLinks as $link)
          <p class="mb-4">
            <a href="{{ url('/'.$link->slug) }}" class="text-gray-600">{{ $link->label }}</a>
          </p>
        @endforeach
      </div>
      <div class="">
        <h6 class="uppercase font-semibold mb-4 flex justify-center md:justify-start">
          Contact
        </h6>
        <p class="flex items-center justify-center md:justify-start mb-4">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path fill="currentColor"
              d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
            </path>
          </svg>
          Niagara Falls, ON Canada
        </p>
        <p class="flex items-center justify-center md:justify-start mb-4">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
            </path>
          </svg>
          contact@kimpaint.com
        </p>
        <p class="flex items-center justify-center md:justify-start mb-4">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone"
            class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
            </path>
          </svg>
          + 01 905 351 7947
        </p>
      </div>
    </div>
  </div>
  <div class="text-center text-white p-6 bg-footer-bg-2">
    <span><p>© 2022 Kim Painting. All rights reserved.</p>
              <p>Built by <a href="https://dallan.ca/"><strong>Dallan</strong></a><p></span>
  </div>
</footer>