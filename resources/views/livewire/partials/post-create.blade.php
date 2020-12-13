<div class="px-4 py-6 sm:px-0">
    <div class="bg-gray-50 shadow border-gray-200 rounded-lg">
        {{-- primary section --}}
        <div class="px-4 py-2 rounded-t bg-gradient-to-r from-green-100 to-green-400 sm:px-6 sm:py-2">
            <h1 class="text-xl">Primary Post Information</h1>
        </div>
        <div class="px-4 rounded-b pb-2 bg-white sm:p-6 border-t-2 border-green-700">
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
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="slug" value="{{ __('Category') }}" />
                            <select id="slug" class="{{$twc->select_d}} text-black" wire:model.defer="post.category_id" autocomplete="off" />
                                    <option value="">Select Category</option>
                                @foreach($categories as $item)
                                    <option value="{{$item->id}}"> {{$item->title}} </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="slug" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-3">

                </div>
            </div>
        </div>
        {{-- primary section --}}
    </div>
</div>
<div class="px-4 py-6 sm:px-0">
    <div class="bg-gray-50 shadow border-gray-200 rounded-lg">
        {{-- post content --}}
        <div class="px-4 py-2 rounded-t bg-gradient-to-r from-red-100 to-red-400 sm:px-6 sm:py-2">
            <h1 class="text-xl">Post Content</h1>
        </div>
        <div class="px-4 rounded-b pb-2 bg-white sm:p-6 border-t-2 border-red-700">
            <div x-data="{
                show: false,
                focusables() {
                    // All focusable element types...
                    let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

                    return [...$el.querySelectorAll(selector)]
                        // All non-disabled elements...
                        .filter(el => ! el.hasAttribute('disabled'))
                },
                firstFocusable() { return this.focusables()[0] },
                lastFocusable() { return this.focusables().slice(-1)[0] },
                nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
                prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
                nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
                prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
             }">
            <button @click="show = true" onclick="editorS()" class="{{$twc->green_button_o}}">Add Content</button>
            @include('livewire.partials.post.post-content-modal')
            </div>
        </div>
        {{-- post content --}}
    </div>
</div>

