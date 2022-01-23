<!-- <div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    full page livewire component
    <p>Current slug is {{ $urlslug }}</p>
    <p>Current title is {{ $title }}</p>
    <p>Current content is {!! $content !!}</p>
</div> -->

<div class="relative bg-white overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>

      <div x-data="{ open: false, onPageLoad:false }">
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
                  <button @click.prevent="open = !open, onPageLoad = true" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 navButton hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
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
        <div :class="{ 'hide': !onPageLoad, 'hideMenu': !open, 'showMenu': open }" class="hide navMenu absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
          <!-- <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden"> -->
            <div class="px-5 pt-4 flex items-center justify-between">
              <div>
                <!-- <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt=""> -->
                <h1 class="logo-text"><strong>KIMPAINT</strong></h1>
              </div>
              <div class="-mr-2">
                <button @click.prevent="open = !open" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 navButton hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
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


<!-- About Us -->
<div class="flex flex-col bg-gray-50">
  <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:items-center lg:justify-between">
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
    <div class="mt-10">
        <div class="relative grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-8">
          <!-- blog post example -->
          <div class="portfolio-card">
              <!-- image -->
              <img class="portfolio-card-img" src=" {{ 'img/hero.png' }}" alt="Photo1"/>
              <p class="pt-4 portfolio-card-type">Blog</p>
              <!-- title -->
              <h2 class="portfolio-card-title">Title of post</h2>
              <!-- short description -->
              <p class="portfolio-card-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel blandit purus. Proin non auctor tellus.</p>
              <!-- read more -->
              <p class="portfolio-card-end">
                  READ MORE
                  <i class="fas fa-angle-double-right"></i>
              </p>
          </div>

          <!-- gallery image example -->
          <div class="portfolio-card">
              <!-- image -->
              <img class="portfolio-card-img" src=" {{ 'img/hero2.jpg' }}" alt="Photo1"/>
              <p class="pt-4 portfolio-card-type">Gallery</p>
              <!-- title -->
              <h2 class="portfolio-card-title">Title of image</h2>
              <!-- short description -->
              <!-- read more -->
              <p class="portfolio-card-end">
                  VIEW MORE
                  <i class="fas fa-angle-double-right"></i>
              </p>
          </div>

          <!-- blog post example -->
          <div class="portfolio-card">
              <!-- image -->
              <img class="portfolio-card-img" src=" {{ 'img/hero3.jpg' }}" alt="Photo1"/>
              <p class="pt-4 portfolio-card-type">Blog</p>
              <!-- title -->
              <h2 class="portfolio-card-title">Title of post</h2>
              <!-- short description -->
              <p class="portfolio-card-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel blandit purus. Proin non auctor tellus.</p>
              <!-- read more -->
              <p class="portfolio-card-end">
                  READ MORE
                  <i class="fas fa-angle-double-right"></i>
              </p>
          </div>

          <!-- gallery image example -->
          <div class="portfolio-card">
              <!-- image -->
              <img class="portfolio-card-img" src=" {{ 'img/hero.png' }}" alt="Photo1"/>
              <p class="pt-4 portfolio-card-type">Gallery</p>
              <!-- title -->
              <h2 class="portfolio-card-title">Title of image</h2>
              <!-- short description -->
              <!-- read more -->
              <p class="portfolio-card-end">
                  VIEW MORE
                  <i class="fas fa-angle-double-right"></i>
              </p>
          </div>

        </div>
    </div>

  </div>
</div>

<!-- CTA -->
<div class="flex flex-col bg-cta-beige relative overflow-hidden">
  <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:items-center lg:justify-between position:relative z-10">
    <h2 class="about-us-title text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">
      <span class="block">How can we help you?</span>
      <span class="block text-orange">Book a free price quote below.</span>
    </h2>
    <div class="sm:justify-center mt-8 flex md:mt-8 lg:mt-12 lg:flex-shrink-0">
      <div class="inline-flex rounded-md shadow">
        <a href="#" class="body-text inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange">
          Call us now (905-351-7947)
        </a>
      </div>
    </div>
  </div>
  <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f2ece4" fill-opacity="1" d="M0,224L80,218.7C160,213,320,203,480,218.7C640,235,800,277,960,250.7C1120,224,1280,128,1360,80L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
  </svg>
</div>

<!-- contact us -->

<!-- footer -->