<x-app-layout>
        @livewire('post-management')
        @push('scripts')
        <script>
            var editorS = function() {
                $('.summernote').summernote({
                    focus: true,
                    height: 300,
                });
                $('.note-editable').addClass('prose lg:prose-lg');
            };
        </script>
        @endpush
</x-app-layout>
