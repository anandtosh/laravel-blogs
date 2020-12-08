<div>
    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8 text-center">
        <x-jet-button wire:click="toggle">
            {{$list_page?'create new post':'list all post'}}
        </x-jet-button>
    </div>
    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
        @if($list_page)
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Posted By
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Sections
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($posts as $post)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{$post->featured_image?$post->featured_image:asset('img/no-image.png')}}" alt="">
                                </div>
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$post->user->name}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{$post->user->email}}
                                </div>
                                </div>
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$post->title}}</div>
                            <div class="text-sm text-gray-500">{{$post->slug}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-4 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{$post->published?'green':'yellow'}}-100 text-{{$post->published?'green':'yellow'}}-800">
                                {{$post->published?'Published':'Draft'}}
                            </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{$post->content?count($post->content):'Empty'}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <x-jet-button wire:click="editPost({{$post->id}})" class="bg-blue-600 hover:bg-blue-500 active:bg-blue-900">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </x-jet-button>
                            <x-jet-button wire:click="delete({{$post->id}})" class="bg-red-600 hover:bg-red-500 active:bg-red-900">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </x-jet-button>
                            </td>
                        </tr>
                        @endforeach
                    <!-- More rows... -->
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        @else

        @endif
    </div>
</div>
