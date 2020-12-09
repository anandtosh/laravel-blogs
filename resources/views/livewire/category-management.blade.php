<div>
    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8 text-center">
        <x-jet-button wire:click="toggle">
            {{$list_page?'create new category':'list all category'}}
        </x-jet-button>
        @if(!$list_page)
        <x-jet-button wire:click="saveCategory" class="bg-green-600 hover:bg-green-500 active:bg-green-900 ">
            Save
        </x-jet-button>
        @endif
    </div>
    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
        @if($list_page)
            @include('livewire.partials.category-list')
        @else
        <div class="px-4 py-6 sm:px-0">
            <div class="bg-gray-50 shadow border-gray-200 rounded-lg h-96">
                @include('livewire.partials.category-create')
            </div>
          </div>
        @endif
    </div>
</div>
