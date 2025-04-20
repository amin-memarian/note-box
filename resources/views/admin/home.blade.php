<!doctype html>
<html lang="fa">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">

        <title>NoteBox</title>

        <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">

        @livewireStyles

    </head>

    <body class="bg-light">

    <div class="container py-5">

        <livewire:note-system />

    </div>

    <script src="{{ asset('assets/bootstrap.bundle.min.j') }}"></script>

    @livewireScripts

    </body>

</html>
