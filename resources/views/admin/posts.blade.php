<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ route('home') }}/app.css" rel="stylesheet">
  <script src="{{ route('home') }}/app.js"></script>
  <title>Cikkek adminisztrációja</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div class="flex flex-row flex-nowrap">
        @include('admin.menu')
        <section class="flex-grow">
            <div class="p-10 bg-cyan-600 text-center text-white text-3xl">
                <h1>Cikkek</h1>
            </div>
            <div class="p-10 flex flex-row justify-between">
                <a href="{{ route('admin') }}/posteditor/?post_id=new&post_type=post">Új hozzáadása</a>
                <input type="text" placeholder="Cikk címe...">
            </div>
            <div class="p-10">
                @php
                    $postModel = new \App\Models\Post();
                    $posts = $postModel->getAllPosts('post', '')->get();
                @endphp
                @foreach($posts as $post)
                    <div class="border-y border-cyan-500 flex flex-row flex-wrap py-3 items-center">
                        <label class="pr-10">
                            <input type="checkbox" value="{{$post->ID}}">
                        </label>
                        <img class="max-h-14" src="{{$post->post_picture}}">
                        <p class="flex-grow px-10">{{$post->post_title}}</p>
                        <p class="mx-3">Státusz: {{$post->status}}</p>
                        <a class="mx-3" target="_blank" href="{{route('home')}}/post/{{$post->slug}}">Megtekint</a>
                        <a class="mx-3" href="{{ route('admin') }}/posteditor/?post_id={{ $post->id }}&post_type=post">Szerkeszt</a>
                        <button>Töröl</button>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</body>
</html>