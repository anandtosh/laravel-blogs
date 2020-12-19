@if(!$submenu)
<x-jet-nav-link href="{{ route($item['route']) }}" :active="request()->route()->uri==$item['route']">
    {!! $item['icon'] !!}{{ __($item['name']) }}
</x-jet-nav-link>
@endif
