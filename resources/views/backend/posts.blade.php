<x-app-layout>
        @livewire('post-management')
        @push('scripts')
        <script>
            var editorS = function() {
                tinymce.init({
                    selector: '#editor_ck',
                    plugins: 'table anchor link autolink charmap lists preview emoticons hr insertdatetime toc advlist code codesample',
                    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist hr | code toc codesample |'
                });
            };

        </script>
        @endpush
</x-app-layout>
