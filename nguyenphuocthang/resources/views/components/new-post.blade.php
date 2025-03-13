
<div class="container mt-4">
    <h2 class="text-center mb-4">New Posts</h2>
    <div class="row" id="post-carousel">
        @foreach ($list as $postitem)
            <div class="col-md-4">
                <x-post-card :$postitem />
            </div>
        @endforeach
    </div>
</div>

