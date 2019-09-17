<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Обратная связь</title>
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row justify-content-md-center h-100">
            <div class="col-8 my-auto">
                <div class="card">
                    <div class="card-header">
                        Форма обратной связи
                    </div>
                    <div class="card-body">
                        <feedback-form></feedback-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>