<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ route('home') }}/app.css" rel="stylesheet">
  <script src="{{ route('home') }}/app.js"></script>
  <title>Adminisztrációs felület</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div class="flex flex-row flex-nowrap">
        @include('admin.menu')
        <section class="flex-grow">
            <div class="p-10 bg-cyan-600 text-center text-white text-3xl">
                <h1>Üdvözöllek az adminisztrációs felületen!</h1>
            </div>
            <div class="p-10">
                <div class="w-2/5 rounded-xl shadow-md p-2">
                    <h2 class="text-2xl">Legfrisebb cikkek</h2>
                    <p class="my-3 rounded-3xl bg-cyan-500 hover:bg-cyan-600 text-center px-4 py-2 text-white w-fit"><a href="{{route('admin')}}/posts">Összes listázása</a></p>
                    @php
                        $postModel = new \App\Models\Post();
                        $posts = $postModel->getAllPosts('post', 'published')->get();
                        $counter = 0;
                    @endphp
                    @foreach($posts as $post)
                        @if($counter < 5)
                            <div class="border-y border-cyan-500 flex flex-row flex-wrap py-3"><p>{{$post->post_title}}</p><a class="mx-3" target="_blank" href="{{route('home')}}/post/{{$post->slug}}">Megtekint</a><a href="{{ route('admin') }}/back_entry/posteditor/?post_id={{ $post->ID }}">Szerkeszt</a></div>
                        @endif
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                    <p class="mt-3 rounded-3xl bg-cyan-500 hover:bg-cyan-600 text-center px-4 py-2 text-white w-fit"><a href="{{ route('admin') }}/back_entry/posteditor/?post_id=new&&post_type=post">Új hozzáadása</a></p>
                </div>
            </div>
        </section>
    </div>
</body>
</html>