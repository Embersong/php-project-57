<header class="w-full">
    <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 shadow-md">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="/" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ __('layout.name') }}</span>
            </a>


            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                            {{ __('layout.nav.tasks') }}
                        </a>
                    </li>
                    <li>
                        <a href="" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                            {{ __('layout.nav.task_statuses') }}
                        </a>
                    </li>
                    <li>
                        <a href="" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                            {{ __('layout.nav.labels') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2"
                       href="{{ route('logout') }}" data-method="post" rel="nofollow">{{ __('layout.nav.logout') }}</a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4
                    rounded">{{ __('layout.nav.login') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2
                         px-4 rounded">{{ __('layout.nav.registration') }}</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>
