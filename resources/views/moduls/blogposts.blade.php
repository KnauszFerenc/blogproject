@php
    $postModel = new \App\Models\Post();
    $posts = $postModel->getAllPosts('post', 'published')->get();
@endphp
<div class="container w-screen flex flex-row flex-wrap p-10 justify-center mx-auto">
    @foreach($posts as $post)
        <a class="blogpost overflow-hidden" href="{{route('home')}}/post/{{$post->slug}}">
            <div style="background-image:url('{{$post->post_picture}}'); min-width:450px" class="bg-cover aspect-square max-w-xl flex flex-row content-end">
                <div class="transition-all duration-500 translate-x-full h-fit w-full bg-transparent opacity-0 flex flex-col p-5">
                    <h3>{{$post->post_title}}</h3>
                    <p>{{$post->post_excerpt}}</p>
                    <p>{{$post->created}}</p>
                    <h4>{{$post->author}}</h4>
                </div>
            </div>
        </a>
    @endforeach
</div>
<style>
    .blogpost > div:hover > div {
        transform: translateX(0); 
        opacity:1; 
        background:rgba(255,255,255,0.8);    
    }
</style>