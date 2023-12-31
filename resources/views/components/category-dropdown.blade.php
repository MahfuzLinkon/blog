<x-dropdown>

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name)  : 'Categories' }}

            {{--                            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px; />--}}

            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                 height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>

        </button>
    </x-slot>

    {{--    links --}}
    <x-dropdown-item  href="/?{{ http_build_query(request()->except('category', 'page')) }}" >All</x-dropdown-item>
{{--    :active="request()->routeIs('home')"--}}

    @foreach($categories as $category)
        <x-dropdown-item
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="isset($currentCategory) && $currentCategory->is($category)"
            {{--                        :active="request()->is('categories/'. $category->slug)"--}}
            {{--                        :active="request()->is('*'. $category->slug)"--}}
        >
            {{ ucwords($category->name) }}
        </x-dropdown-item>
        {{--                    <a--}}
        {{--                        href="/categories/{{ $category->slug }}"--}}
        {{--                        class="{{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }} block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white"--}}
        {{--                    >--}}
        {{--                        {{ ucwords($category->name) }}--}}
        {{--                    </a>--}}
    @endforeach
</x-dropdown>
