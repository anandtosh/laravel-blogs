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
@push('scripts')
<script>
    // var editorS = function() {
    //     tinymce.init({
    //         selector: '#editor_ck',
    //         plugins: 'table anchor link autolink charmap lists preview emoticons hr insertdatetime toc advlist code codesample',
    //         toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist hr | code toc codesample |',
    //         setup:function(ed) {
    //         ed.on('change', function(e) {
    //                 Livewire.emit('contentUpdate',ed.getContent());
    //             });
    //         }
    //     });
    // };
</script>
<script>
    editor_content = '';
    const editorS = (content) => {
        tinymce.init({
        selector: '#editor_ck',
        plugins: 'table anchor link autolink charmap lists preview emoticons hr insertdatetime toc advlist code codesample',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist hr | code toc codesample |',
        setup:function(ed) {
                ed.on('change', function(e) {
                    window.editor_content = ed.getContent();
                });
                ed.on('init', function (e) {
                    ed.setContent(content);
                });
            }
        });
    }
    document.addEventListener('DOMContentLoaded', () => {
        this.livewire.on('set:editor', data => {
            tinyMCE.execCommand("mceRemoveControl", true, 'editor_ck');
            editorS(data.content);
        })
    });
    const saveEditorWindowContent = () =>{
        window.livewire.emit('set:editorContent', editor_content);
    }
</script>
@endpush
