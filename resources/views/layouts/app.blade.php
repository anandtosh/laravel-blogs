<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{-- <link href="https://myCDN.com/prism@v1.x/themes/prism.css" rel="stylesheet" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/i9l8vnx7rc5uddtpyugnw0j2waifmgtfnmpguwczrvzhk0ux/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @livewireScripts
        {{-- <script src="https://myCDN.com/prism@v1.x/components/prism-core.min.js"></script> --}}
        {{-- <script src="https://myCDN.com/prism@v1.x/plugins/autoloader/prism-autoloader.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script>
                const SwalModal = (icon, title, html) => {
                    Swal.fire({
                        icon,
                        title,
                        html
                    })
                }

                const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
                    Swal.fire({
                        icon,
                        title,
                        html,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText,
                        reverseButtons: true,
                    }).then(result => {
                        if (result.value) {
                            return livewire.emit(method, params)
                        }

                        if (callback) {
                            return livewire.emit(callback)
                        }
                    })
                }

                const SwalAlert = (icon, title, timeout = 7000) => {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: timeout,
                        onOpen: toast => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon,
                        title
                    })
                }

                document.addEventListener('DOMContentLoaded', () => {
                    this.livewire.on('swal:modal', data => {
                        SwalModal(data.icon, data.title, data.text)
                    })

                    this.livewire.on('swal:confirm', data => {
                        SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
                    })

                    this.livewire.on('swal:alert', data => {
                        SwalAlert(data.icon, data.title, data.timeout)
                    })
                })
        </script>
        @stack('scripts')


    </body>
</html>
