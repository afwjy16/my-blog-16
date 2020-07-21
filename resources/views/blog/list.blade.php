@extends('template_blog/home')
@section('content')
<div class="col-md-8">
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h2 class="title">List posts</h2>
            </div>
        </div>
        @foreach ($listPost as $item)
        <div class="col-md-12">
            <div class="post post-row">
                <a class="post-img" href="{{ route('detail', $item->slug )}}"><img src="{{ asset($item->gambar)}}" alt=""></a>
                <div class="post-body">
                    <div class="post-category">
							<a href="{{ route('detail', $item->slug )}}">{{ $item->category->name }}</a>
                    </div>
                    <h3 class="post-title"><a href="{{ route('detail', $item->slug )}}">{{ $item->judul }}</a></h3>
                    <ul class="post-meta">
                        <li><a href="{{ route('detail', $item->slug )}}">{{ $item->users->name }}</a></li>
                        <li>{{ ($item->created_at)->translatedFormat('d F Y') }}</li>
                    </ul>
                    {!! Str::limit($item->content, 160) !!}
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-12 text-center">
			{{ $listPost->links() }}
        </div> 
    </div>
</div>

@endsection
