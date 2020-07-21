<div class="col-md-4">
    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Social Media</h2>
        </div>
        <div class="social-widget">
            <ul>
                <li>
                    <a href="#" class="social-facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-google-plus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /social widget -->

    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Categories</h2>
        </div>
        <div class="category-widget">
            <ul>
                @foreach ($category_widget as $item)
                    <li><a href="{{ route('list.category', $item->slug ) }}">{{ $item->name }} <span>{{ $item->posts->count() }}</span></a></li>
				@endforeach 
            </ul>
        </div>
    </div>
    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Popular Posts</h2>
        </div>
        <!-- post -->
        @foreach ($popularPost as $item)
        <div class="post post-widget">
            <a class="post-img" href="{{ route('detail', $item->slug )}}"><img src="{{ asset($item->gambar) }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="{{ route('detail', $item->slug )}}">{{ $item->category->name }}</a>
                </div>
                <h3 class="post-title"><a href="{{ route('detail', $item->slug )}}">{{ $item->judul }}</a></h3>
            </div>
        </div>
        @endforeach 
        <!-- /post -->
    </div>
    <!-- /post widget -->
    <!-- galery widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Instagram</h2>
        </div>
        <div class="galery-widget">
            <ul>
                <li><a href="#"><img src="{{ asset('frontend/img/galery-1.jpg')}}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('frontend/img/galery-2.jpg')}}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('frontend/img/galery-3.jpg')}}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('frontend/img/galery-4.jpg')}}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('frontend/img/galery-5.jpg')}}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('frontend/img/galery-6.jpg')}}" alt=""></a></li>
            </ul>
        </div>
    </div>
    <!-- /galery widget -->
</div>
