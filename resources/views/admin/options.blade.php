<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ route('home') }}/app.css" rel="stylesheet">
  <script src="{{ route('home') }}/app.js"></script>
  <title>Beállítások</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
@php 
    $optionModel = new \App\Models\Options();
@endphp
<body>
    <div class="flex flex-row flex-nowrap">
        @include('admin.menu')
        <section class="flex-grow">
            <div class="p-10 bg-cyan-600 text-center text-white text-3xl">
                <h1>Beállítások</h1>
            </div>
            <form id="oprionsForm" class="p-10" method="POST" action="{{ route('home') }}/process/options">
                @csrf
                <div class="flex flex-row flex-wrap">
                    <div class="max-w-sm">
                        <fieldset class="flex flex-col p-3 border rounded mb-3">
                            <legend>Alap adatok:</legend>
                            <input class="border rounded mb-3" type="text" name="title" value="{{$optionModel->getOption('title')->option_value}}" placeholder="Oldal címe">
                            <input type="text" class="border rounded mb-3" name="meta_author" value="{{$optionModel->getOption('meta_author')->option_value}}" placeholder="Az oldal szerkesztője">
                            <textarea class="border rounded mb-3" name="meta_description" placeholder="Az oldal leírása">{{$optionModel->getOption('meta_description')->option_value}}</textarea>
                            <textarea class="border rounded mb-3" name="meta_keywords" placeholder="Kulcsszavak vesszővel elválasztva">{{$optionModel->getOption('meta_keywords')->option_value}}</textarea>
                        </fieldset>
                        <fieldset class="flex flex-col p-3 border rounded mb-3">
                            <legend>Főoldal adatai:</legend>
                            <label class="border rounded mb-3"><input type="checkbox" name="homepageswitch" value="1" {{ $optionModel->getOption('news_in_menu')->option_value == 1 ? 'checked' : '' }}>Lecseréli az eredeti főoldalt egy létező oldalra?</label>
                            <div class="flex flex-col">
                                <label class="border rounded mb-3">Főoldal:
                                    <select name="statichomepage">
                                    </select>
                                </label>
                                <input class="border rounded mb-3" type="text" name="news_slug" value="{{$optionModel->getOption('meta_description')->option_value}}" placeholder="Hírek oldal aliasa/slugja">
                                <label class="border rounded mb-3"><input type="checkbox" name="news_in_menu" value="1" {{ $optionModel->getOption('news_in_menu')->option_value == 1 ? 'checked' : '' }}>Hírek oldal szerepeljen a menüben?</label>
                                <label class="border rounded mb-3">Hírek menü pozíció<input type="number" name="news_place_in_menu" value="{{$optionModel->getOption('news_place_in_menu')->option_value}}"></label>
                            </div>
                            <div class="flex flex-col">
                                <input class="border rounded mb-3" type="text" name="homepage_subtitle" value="{{$optionModel->getOption('homepage_subtitle')->option_value}}" placeholder="Főoldal alcíme">
                                <input class="border rounded mb-3" type="text" name="homepage_firstblock_title" value="{{$optionModel->getOption('homepage_firstblock_title')->option_value}}" placeholder="Főoldal első blokk címe">
                                <textarea class="border rounded mb-3" name="homepage_firstblock" placeholder="Főoldal első blokk szövege">{{$optionModel->getOption('homepage_firstblock')->option_value}}</textarea>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <input class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded mx-auto" type="submit" name="confirmation" value="Mentés">
            </form>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </section>
    </div>
</body>
</html>