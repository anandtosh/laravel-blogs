<div class="px-4 py-5 bg-white sm:p-6">
    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-3">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <x-jet-label for="title" value="{{ __('Post Title') }}" />
                    <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:keyup="slugMod" wire:model.defer="post.title" autocomplete="title" />
                    <x-jet-input-error for="title" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" />
                    <x-jet-input id="slug" type="text" class="mt-1 block w-full" wire:model="post.slug" autocomplete="slug" />
                    <x-jet-input-error for="slug" class="mt-2" />
                </div>
                {{-- <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" />
                    <x-jet-input id="slug" type="radio" class="mt-1 block w-full" wire:model.defer="post.slug" autocomplete="slug" />
                    <x-jet-input-error for="slug" class="mt-2" />
                </div> --}}
            </div>
        </div>
        <div class="col-span-6 sm:col-span-3">

        </div>
    </div>
</div>
