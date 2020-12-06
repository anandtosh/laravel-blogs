<div class="mt-5 md:mt-0 md:col-span-2">
    <form wire:submit.prevent="saveSiteSettings">
        {{-- <div class="shadow overflow-hidden sm:rounded-md"> --}}
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Site Name') }}" />
                        <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="name" autocomplete="name" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="email" value="{{ __('Site Email') }}" />
                        <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model="email" autocomplete="email" />
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>

                </div>
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        {{-- </div> --}}
    </form>
</div>
