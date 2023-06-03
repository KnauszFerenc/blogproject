@php
    $postModel = new \App\Models\Post();
    $page = $postModel->getPostByTitleOrId($slug);
@endphp
@include('needable.head', ['title' => $page->post_title])
@include('moduls.menu')
@include('moduls.hero', ['title' => $page->post_title])
<div>
    {!!$page->post_body!!}
</div>
@include('needable.footer')