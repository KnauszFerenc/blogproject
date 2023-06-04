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
    }
    $priorityhtml = '<label>Kiemelt<input type="checkbox" name="priority" value="{{$priority}}"></label>';
    if($post_type == 'page'){
        $priorityhtml = '<label>Menüsorrend<input type="number" name="priority" value="{{$priority}}"></label><br>';
    }
@endphp
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ route('home') }}/app.css" rel="stylesheet">
  <script src="{{ route('home') }}/app.js"></script>
  <title>Oldalak adminisztrációja</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div class="flex flex-row flex-nowrap">
        @include('admin.menu')
        <section class="flex-grow">
            <div class="p-10 bg-cyan-600 text-center text-white text-3xl">
                <h1>Oldalak</h1>
            </div>
            <form class="p-10 flex flex-row flex-wrap">
                <div class="flex flex-col">
                    <input type="text" name="post_title" placeholder="Cím">
                    <input type="text" name="slug" placeholder="slug/alias">
                    <input type="hidden" name="post_type" value="">
                    <input type="hidden" name="author" value="">
                    <input type="hidden" name="modified_by" value="">      
                    <textarea name="post_body" placeholder="Bejegyzés tartalma"></textarea>              
                </div>
                <div class="flex flex-col">
                    {{$priorityhtml}}
                    <textarea name="post_excerpt" placeholder="Kivonat"></textaera>
                    <div>
                        <p>Kiemelt kép</p>
                        <select name="post_picture">

                        </select>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>