<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Dev.<span
                    class="text-blue-500">hub</span></span>
        </a>

        @guest
            <div class="flex md:order-2">
                <a href="/register"
                   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3  md:mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Sign in
                </a>
                <a href="/login"
                   class="text-blue-700 bg-gray-100 border-2 border-blue-300 transition-colors duration-300 hover:bg-blue-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 text-center mr-2 md:mr-0 ">
                    Sign up
                </a>
            </div>
        @endguest

        @auth
            <div>
                <div class="mt-8 md:mt-0 flex items-center max-w-lg">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">Welcome, {{auth()->user()->name}}!</button>
                        </x-slot>

                        @can('admin')
                            <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Dashboard
                            </x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New post
                            </x-dropdown-item>
                        @endcan

                        <x-dropdown-item href="/profile/{{auth()->user()->id}}" :active="request()->is('profile')">Profile
                        </x-dropdown-item>
                        <x-dropdown-item href="#" x-data="{}"
                                         @click.prevent="document.querySelector('#logout-form').submit()">Log out
                        </x-dropdown-item>


                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                </div>
            </div>
        @endauth

    </div>
</nav>
