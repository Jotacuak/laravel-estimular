<div class="blog-container">

    @foreach($posts as $post)

        <div class="blog-elements">
            <div class="blog-element-image">
                <img src="{{Storage::url('posts2.webp')}}" alt="blog">
            </div>
            <div class="blog-element-text">
                <div class="blog-element-title">
                    <h3>{{$post->title}}</h3>
                </div>
                <div class="blog-element-sumary">
                    <p>{!!isset($post->sumary) ? $post->sumary : "" !!}</p>
                </div>
            </div>
        </div>

    @endforeach
    
</div>