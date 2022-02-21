<x-layout>

    <x-nav-menu />

    @include ('posts._bread-crumb')
    
    @include ('posts._header')

    <main>
        <div class="max-w-7xl mx-auto p-4 py-6 sm:px-6 lg:px-8 body-text">
            
        <!-- <div class="px-6 py-8"> -->
        <div class="max-w-7xl max-w-7xl mx-auto flex flex-col lg:flex-row justify-between">
        
            <form class="w-full flex-auto">
                <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                    Name (*)
                    </label>
                    <input class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-name" type="text" placeholder="Jane Doe">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-company">
                    Company
                    </label>
                    <input class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-company" type="text" placeholder="ACME Ltd.">
                </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    E-mail (*)
                    </label>
                    <input class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email">
                </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Message (*)
                    </label>
                    <textarea class=" no-resize appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message"></textarea>
                </div>
                </div>
                <div class="md:flex md:items-center">
                <div class="w-full">
                    <button class="w-full sm:w-64 lg:w-32 shadow bg-orange focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Send
                    </button>
                </div>
                <div class="md:w-2/3"></div>
                </div>
            </form>

            <div class="hidden lg:block ml-10 w-1/2">
                <h2 class="mb-6 pb-2 border-b-4 border-orange text-3xl font-bold text-gray-900 body-text">Contact Info</h2>

                <div class="relative flex items-center mb-10">
                    <p class="text-lg leading-6 font-medium text-gray-900">
                    Please contact us by phone, text, or email to learn more
                    about our services and team. Everyone gets a free job quote
                    and we will come directly to you. We typically respond within
                    the same day and able to quote within two-three days.
                    </p>
                </div>
                <div class="relative flex items-center mb-10">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-orange text-white text-2xl">
                    <i class="fas fa-phone"></i>
                    </div>
                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">+1 905-351-7947</p>
                </div>
                <div class="relative flex items-center">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-orange text-white text-2xl">
                    <i class="fas fa-envelope"></i>
                    </div>
                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">contact@kimpaint.com</p>
                </div>
            </div>
            
        </div>
        <!-- </div> -->
            

        </div>
    </main>
    <script src="./js/slider.js"></script>
</x-layout>