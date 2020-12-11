    <!-- Toggle Button -->
    <label for="{{$id}}" class="flex items-center cursor-pointer">
      <!-- toggle -->
      <div class="relative">
        <!-- input -->
        <input id="{{$id}}" {{isset($name)?'name="'.$name.'"':''}} type="checkbox" {{isset($checked) && $checked==true?'checked':''}} class="hidden" />
        <!-- line -->
        <div class="toggle__line w-10 h-4 bg-gray-200 rounded-full shadow-inner">
        </div>
        <!-- dot -->
        <div class="toggle__dot absolute w-6 h-6 bg-gray-300 rounded-full shadow inset-y-0 left-0">
        </div>
      </div>
      <!-- label -->
      <div class="ml-3 text-gray-700 font-medium">
        {{$label??''}}
      </div>
    </label>
