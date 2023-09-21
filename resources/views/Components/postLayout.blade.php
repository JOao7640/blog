@props(['post'])

<article
        {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            @if(isset($post->thumbnail))
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post thumbnail"
                     class="rounded-xl w-full h-96 object-cover">
            @else
                <img src="{{ asset('images/illustration1.png' . $post->thumbnail) }}" alt="Blog Post thumbnail"
                     class="rounded-xl w-full h-96 object-cover">
            @endif
        </div>

        <div class="mt-6 flex mt-2 flex-col justify-between flex-1">
            <header>
                <div>
                    <x-category-button :category="$post->category"/>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl clamp one-line">
                        <a href="/posts/{{$post->slug}}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4 whitespace-normal text-justify">
                {!! $post->excerpt !!}
            </div>


            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    @if(isset($post->author->profilePicture))
                        <img src="/storage/{{$post->author->profilePicture}}" alt="Profile picture"
                             class="w-14 rounded-full">

                    @else
                        <img src="/storage/profilePictures/defaultImage.jpg" alt="Profile picture"
                             class="w-14 rounded-full">
                    @endif
                    <div class="ml-3 flex items-center">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                        </h5>

                        <div class="flex justify-center items-center ml-2">
                            <p class="mr-1 text-base text-blue-400">{{$post->view_count}}</p>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" style="fill: rgb(96 165 250);" viewBox="0 0 20 14">
                                <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
