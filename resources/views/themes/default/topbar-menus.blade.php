@if(!$submenu)
<x-jet-nav-link href="{{ route($item['route']) }}" :active="request()->route()->uri==$item['route']">
    {{ __($item['name']) }}
</x-jet-nav-link>
@endif
