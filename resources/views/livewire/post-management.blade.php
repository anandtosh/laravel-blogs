<div>
    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8 text-center">
        <x-jet-button wire:click="toggle">
            {{$list_page?'create new post':'list all post'}}
        </x-jet-button>
        @if(!$list_page)
        <x-jet-button wire:click="savePost" class="{{$twc->green_button}}">
            Save
        </x-jet-button>
        @endif
    </div>
    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
        @if($list_page)
            @include('livewire.partials.post-list')
        @else
            @include('livewire.partials.post-create')
        @endif
    </div>
</div>
