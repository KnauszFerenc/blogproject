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
    $priorityhtml = '<label  class="border rounded mb-3">Kiemelt<input type="checkbox" name="priority" value="{{$priority}}"></label>';
    $in_menu = '';
    $typeis = 'cikk';
    if($post_type == 'page'){
        $priorityhtml = '<label  class="border rounded mb-3">Menüsorrend<input type="number" name="priority" value="{{$priority}}"></label><br>';
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
            <form class="p-10 flex flex-row flex-wrap">
                <div class="flex flex-col">
                    <input class="border rounded mb-3" type="text" name="post_title" placeholder="Cím">
                    <input type="text" name="slug" placeholder="slug/alias">
                    <input type="hidden" name="post_type" value="">
                    <input type="hidden" name="author" value="">
                    <input type="hidden" name="modified_by" value="">      
                    <textarea name="post_body" placeholder="Bejegyzés tartalma"></textarea>              
                </div>
                <div class="flex flex-col">
                    <select name="status">
                        <option value="draft">Vázlat</option>
                        <option value="published">Közzétett</option>
                        {!! $in_menu !!}
                    </select>
                    {!! $priorityhtml !!}
                    <textarea name="post_excerpt" placeholder="Kivonat"></textarea>
                    <div>
                        <p>Kiemelt kép</p>
                        <select class="border rounded mb-3" name="post_picture">

                        </select>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>