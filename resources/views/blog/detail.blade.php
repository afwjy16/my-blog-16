@extends('template_blog/home')
@section('content')
<div class="col-md-8">
    <div id="post-header" class="page-header">
        <div class="page-header-bg" data-stellar-background-ratio="0.5">
            <div class="page-image-bg" style="background-image: url({{ asset($detailPost->gambar) }});">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                        <a href="#">{{ $detailPost->category->name }}</a>
                    </div>
                    <h1></h1>
                    <ul class="post-meta">
                        <li><a href="author.html">{{ $detailPost->users->name }}</a></li>
                        <li>{{ ($detailPost->created_at)->translatedFormat('d F Y ') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- post content -->
    <div class="section-row">
        <h3>{{ $detailPost->judul }}</h3>
        {!! $detailPost->content !!}
    </div>
    <!-- /post content -->

    <!-- post tags -->
    <div class="section-row">
        <div class="post-tags">
            <ul>
                <li>TAGS:</li>
                @foreach ($detailPost->tags as $tag)
							<li href="#">{{ $tag->name }}</li>
				@endforeach
            </ul>
        </div>
    </div>
    <!-- /post tags -->

    <!-- /related post -->
    <div>
        <div class="section-title">
            <h3 class="title">Related Posts</h3>
        </div>
        <div class="row">
            @foreach ($relatedPost as $item)
            <div class="col-md-4">
                <div class="post post-sm">
                    <a class="post-img" href="{{ route('detail', $item->slug )}}"><img src="{{ asset($item->gambar)}}" style="height: 160px;" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{ route('detail', $item->slug )}}">{{ $item->category->name }}</a>
                        </div>
                        <h3 class="post-title title-sm"><a href="{{ route('detail', $item->slug )}}">{{ $item->judul}}</a></h3>
                        <ul class="post-meta">
                            <li><a href="{{ route('detail', $item->slug )}}">{{ $item->users->name }}</a></li>
                            <li>{{ ($item->created_at)->translatedFormat('d F Y ') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /related post -->

    <!-- post comments -->
    <div class="section-row">
        <div class="section-title">
            <h3 class="title">3 Comments</h3>
        </div>
        <div class="post-comments">
            <!-- comment -->
            <div class="media">
                <div class="media-left">
                    <img class="media-object" src="./img/avatar-2.jpg" alt="">
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <h4>John Doe</h4>
                        <span class="time">5 min ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="reply">Reply</a>
                    <!-- comment -->
                    <div class="media media-author">
                        <div class="media-left">
                            <img class="media-object" src="./img/avatar-1.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <h4>John Doe</h4>
                                <span class="time">5 min ago</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="#" class="reply">Reply</a>
                        </div>
                    </div>
                    <!-- /comment -->
                </div>
            </div>
            <!-- /comment -->

            <!-- comment -->
            <div class="media">
                <div class="media-left">
                    <img class="media-object" src="./img/avatar-3.jpg" alt="">
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <h4>John Doe</h4>
                        <span class="time">5 min ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="reply">Reply</a>
                </div>
            </div>
            <!-- /comment -->
        </div>
    </div>
    <!-- /post comments -->

    <!-- post reply -->
    <div class="section-row">
        <div class="section-title">
            <h3 class="title">Leave a reply</h3>
        </div>
        <form class="post-reply">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="input" name="message" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="input" type="text" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="input" type="text" name="website" placeholder="Website">
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="primary-button">Submit</button>
                </div>

            </div>
        </form>
    </div>
    <!-- /post reply -->
</div>
@endsection	

