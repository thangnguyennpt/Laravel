<div class="alert alert-light post-card">
    <div class="text-center">
        <a href="{{ route('site.post.detail', ['slug' => $post->slug]) }}">
            <img src="{{ asset('images/posts/' . $post->image) }}" class="rounded post-image" alt="hinh"
            style="max-width:280px; max-height:300px;">
        </a>
    </div>
    <div class="text-center pt-3 mt-3 border-top">
        <span class="post-name d-block">
            <a href="{{ route('site.post.detail', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
        </span>
        
    </div>
</div>

<link href="{{ asset('js/scrollPost.js') }}" rel="stylesheet">
<link href="{{ asset('css/postcard.css') }}" rel="stylesheet">
