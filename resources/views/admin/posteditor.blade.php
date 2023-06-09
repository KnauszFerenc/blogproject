@php
    $post_type = $_GET['post_type'];
    $ID = $_GET['post_id'];
    $post_title = '';
    $author = '';
    $slug = '';
    $post_body = '';
    $modified_by = '';
    $post_excerpt = '';
    $post_picture = '';
    $priority = '';
    $isitnew = "új";
    $isitnew2 = "";
    if($ID != 'new'){
        $postModel = new \App\Models\Post();
        $post = $postModel->getPostById($ID);
        $post_title = $post->post_title;
        $author = $post->author;
        $slug = $post->slug;
        $post_body = $post->post_body;
        $modified_by = $post->modified_by;
        $post_excerpt = $post->post_excerpt;
        $post_picture = $post->post_picture;
        $priority = $post->priotity;
        $isitnew = "";
        $isitnew2 = "szerkesztése";
    }
    $priorityhtml = '<div class="rounded-xl shadow-md p-2"><p>Kiemelt</p><input class="border rounded mb-3" type="checkbox" name="priority" value="{{$priority}}"></div>';
    $in_menu = '';
    $typeis = 'cikk';
    if($post_type == 'page'){
        $priorityhtml = '<div class="rounded-xl shadow-md p-2"><p>Menüsorrend</p><input class="border rounded mb-3" type="number" name="priority" value="{{$priority}}"></div>';
        $typeis = 'oldal';
        $in_menu = '<option value="in_menu">Menüben közzétett</option>';
    }
@endphp
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ route('home') }}/app.css" rel="stylesheet">
  <script src="{{ route('home') }}/app.js"></script>
  <title>{{$isitnew}} {{$typeis}} {{$isitnew2}}</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div class="flex flex-row flex-nowrap">
        @include('admin.menu')
        <section class="flex-grow">
            <div class="p-10 bg-cyan-600 text-center text-white text-3xl">
                <h1>{{$isitnew}} {{$typeis}} {{$isitnew2}}</h1>
            </div>
            <form class="p-10 flex flex-row flex-wrap" action="{{ route('home') }}/process/post" method="POST">
                @csrf
                <div class="flex-grow flex flex-col px-10 ">
                    <input class="border rounded mb-3" type="text" name="post_title" value="{{$post_title}}" placeholder="Cím">
                    <input class="border rounded mb-3" type="text" name="slug" value="{{$slug}}" placeholder="slug/alias">
                    <input type="hidden" name="post_type" value="{{$post_type}}">
                    <input type="hidden" name="author" value="{{$author}}">
                    <input type="hidden" name="modified_by" value="">      
                    <input type="hidden" name="id" value="{{$ID}}">      
                    <textarea class="border rounded mb-3 w-full h-4/5" name="post_body" placeholder="Bejegyzés tartalma">{{$post_body}}</textarea>              
                </div>
                <div class="w-2/5 flex flex-col">
                    <div class="rounded-xl shadow-md p-2">
                        <p>Állapot</p>
                        <select class="border rounded mb-3" name="status">
                            <option value="draft">Vázlat</option>
                            <option value="published">Közzétett</option>
                            {!! $in_menu !!}
                        </select>
                    </div>
                    {!! $priorityhtml !!}
                    <div class="rounded-xl shadow-md p-2">
                        <textarea class="border rounded mb-3 w-full h-52" name="post_excerpt" placeholder="Kivonat">{{$post_excerpt}}</textarea>
                    </div>
                    <div class="rounded-xl shadow-md p-2">
                        <p>Kiemelt kép</p>
                        <select class="border rounded mb-3" name="post_picture">
                            <option value="">Válassz!</option>
                        </select>
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