@php
    $pageModel = new \App\Models\Post();
    $pages = $pageModel->getAllPosts('page', 'in_menu')->get();
@endphp
<nav x-data="{ scrolled: false}" x-init="window.addEventListener('scroll', () => { scrolled = (window.scrollY >= 100);})" :class="{ 'bg-white': scrolled}" class="transition-all duration-500 fixed z-50 w-screen flex flex-row justify-end px-5">
    <a :class="{'text-black': scrolled}" class="menuitem p-3 text-white transition-all duration-500" href="{{ route('home') }}">
        <p style="text-shadow:0px 0px 5px rgba(0,0,0,0.5)" class="transition-all duration-500 font-black text-center uppercase">Főoldal</p>
    </a>
    @foreach($pages as $page)
        <a :class="{'text-black': scrolled}" class="menuitem p-3 text-white transition-all duration-500" href="{{route('home')}}/{{$page->slug}}">
            <p style="text-shadow:0px 0px 5px rgba(0,0,0,0.5)" class="transition-all duration-500 font-black text-center uppercase">{{$page->post_title}}</p>
        </a>
    @endforeach
</nav>