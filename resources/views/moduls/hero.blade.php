@php
    $post_picture = 'http://127.0.0.1:8000/images/banner.jpg';
@endphp
<header style="background-image:url('{{$post_picture}}')" class="sdividerbottom bg-cover bg-fixed to-blue-500 container flex flex-col justify-center justify-items-center content-center min-w-full min-h-screen">
    <h1 style="text-shadow:0px 0px 5px rgba(0,0,0,0.5)" class="text-4xl font-black text-center text-white uppercase">{{$title}}</h1>
    <button x-data="{
        scrollToNextSibling: function(){
            let parent = this.$el.parentNode;
            let nextSibling = parent.nextElementSibling;
            if(nextSibling){
                nextSibling.scrollIntoView({
                    behavior:'smooth'
                });
            }
        }
    }" @click="scrollToNextSibling()" class="transition-all duration-500 mx-auto mt-3 justify-self-center py-1 px-2 max-w-fit bg-transparent border border-white font-semibold text-white bg-black/[.06] backdrop-blur-sm hover:text-black hover:bg-white">Tovább</button>
</header>