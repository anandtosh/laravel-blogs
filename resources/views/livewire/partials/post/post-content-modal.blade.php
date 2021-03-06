<div
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    id=""
    class="fixed top-0 inset-x-0 px-4 pt-6 z-50 sm:px-0 sm:flex sm:items-top sm:justify-center"
    style="display: none;"
>
    <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-show="show" class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-7xl"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        {{-- content here --}}
        <div class="px-4 py-2 rounded-t bg-gradient-to-r from-yellow-100 to-yellow-400 sm:px-6 sm:py-2">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <div class="text-xl">Primary Post Information</div>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <button class="{{$twc->red_button_od}} float-right ml-5" onclick="destroyEditor()" x-on:click="show = false">Cancel</button>
                    <button class="{{$twc->green_button_od}} float-right ml-5" onclick="saveEditorWindowContent()">Save</button>
                </div>
            </div>
        </div>
        <div class="px-4 rounded-b pb-2 bg-white sm:p-6 border-t-2 border-yellow-700">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <div wire:loading class="text-red-600 text-3xl"> Please wait while saving changes.... </div>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <div class="ck_container">
                        <div id="editor_ck">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- content here --}}
    </div>
</div>

