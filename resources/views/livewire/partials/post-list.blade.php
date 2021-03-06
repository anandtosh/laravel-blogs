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
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Category
                </th>
                <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($posts as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{$item->featured_image?$item->featured_image:asset('img/no-image.png')}}" alt="">
                        </div>
                        <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{$item->user->name}}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{'Created on '.$item->created_at->format('d, M Y')}}
                        </div>
                        </div>
                    </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$item->title}}</div>
                    <div class="text-sm text-gray-500">{{$item->slug}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    {{-- <span class="px-4 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{$item->published?'green':'yellow'}}-100 text-{{$item->published?'green':'yellow'}}-800">
                        {{$item->published?'Published':'Draft'}}
                    </span> --}}
                    @include('tailwind.radio',['id'=>'published'.$item->id,'checked'=>$item->published, 'event'=>'wire:click="publishStatus('.$item->id.')"' ])
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{$item->content?count($item->content):'Empty'}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{isset($item->category_id)?$item->category->title:'None'}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <x-jet-button wire:click="editPost({{$item->id}})" class="{{$twc->blue_button}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </x-jet-button>
                    <x-jet-button wire:click="delete({{$item->id}})" class="{{$twc->red_button}}">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </x-jet-button>
                    </td>
                </tr>
                @endforeach
            <!-- More rows... -->
            </tbody>
            <tfoot class="bg-gray-100 divide-y divide-gray-200">
            <td colspan="6" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{$posts->links()}}
            </td>
            </tfoot>
        </table>
        </div>
    </div>
    </div>
</div>
