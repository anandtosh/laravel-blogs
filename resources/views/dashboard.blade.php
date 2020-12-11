<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-2 sm:col-span-3">
                    <div class="bg-white p-4 overflow-hidden shadow sm:rounded-lg">
                        <div class="grid grid-cols-6">
                            <div class="col-span-1 text-2xl text-blue-600 ">
                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                            </div>
                            <div class="col-span-5">
                                <p class="text-gray-600">Total Posts</p>
                                <p class="text-xl">15</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="player"></div>
</x-app-layout>
