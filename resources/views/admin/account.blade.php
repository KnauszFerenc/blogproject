<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ route('home') }}/app.css" rel="stylesheet">
  <script src="{{ route('home') }}/app.js"></script>
  <title>Fiókom</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div class="flex flex-row flex-nowrap">
        @include('admin.menu')
        <section class="flex-grow">
            <div class="p-10 bg-cyan-600 text-center text-white text-3xl">
                <h1>Felhasználói fiókom</h1>
            </div>
            <form class="p-10">
                <div class="flex flex-row flex-wrap">
                    <div class="max-w-sm">
                        <fieldset class="flex flex-col p-3 border rounded mb-3">
                            <legend>Alap adatok:</legend>
                            <input class="border rounded mb-3" type="text" name="username" value="" placeholder="Felhasználónév" disabled>
                            <input class="border rounded mb-3" type="text" name="email" value="" placeholder="E-mail cím">
                        </fieldset>
                        <fieldset  class="flex flex-col p-3 border rounded mb-3">
                            <legend>Személyes adatok:</legend>
                            <input class="border rounded mb-3" type="text" name="firstname" value="" placeholder="Keresztnév">
                            <input class="border rounded mb-3" type="text" name="lastname" value="" placeholder="Vezetéknév">
                            <input class="border rounded mb-3" type="text" name="position" value="" placeholder="Beosztás">
                        </fieldset>
                        <fieldset  class="flex flex-col p-3 border rounded mb-3">
                            <legend>Jelszó:</legend>
                            <label>Jelenlegi jelszó<input class="border rounded mb-3" type="password" name="oldpass" value=""></label>
                            <label>Új jelszó<input class="border rounded mb-3" type="password" name="newpass" value=""></label>
                            <label>Új jelszó ismét<input class="border rounded mb-3" type="password" name="newpassverification" value=""></label>
                        </fieldset>
                    </div>
                    <div class="max-w-sm ml-4">
                        <fieldset class="flex flex-col p-3 border rounded mb-3">
                            <legend>Profilkép:</legend>
                            <img src="">
                            <input class="border rounded mb-3" type="file" name="profile" value="">
                        </fieldset>
                    </div>
                </div>
                <input class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded mx-auto" type="submit" name="confirmation" value="Mentés">
            </form>
        </section>
    </div>
</body>
</html>