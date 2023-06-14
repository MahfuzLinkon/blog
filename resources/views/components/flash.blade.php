@if(\Illuminate\Support\Facades\Session::has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(()=> show = false, 4000)"
         x-show="show"
         class="fixed bottom-3 bg-blue-500 text-white text-sm px-4 py-2 rounded right-7"
    >
        <p>{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
    </div>
@endif
