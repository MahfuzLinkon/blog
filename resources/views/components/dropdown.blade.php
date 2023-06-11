@props(['trigger'])

<div x-data="{ show: false }" @click.away="show= false" >
    {{-- Tigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{--    Dropdown item links  --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded w-full z-50 overflow-auto max-h-52">
        {{ $slot }}
    </div>
</div>
