@extends('template_blog/home')
@section('content')
@include('blog.banner')
<div class="col-md-8">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="section-title">
				<h2 class="title">Recent posts</h2>
			</div>
		</div>
		@foreach ($recentPost as $item)
		<div class="col-md-6">
			<div class="post">
				<a class="post-img" href="{{ route('detail', $item->slug )}}"><img src="{{ asset($item->gambar)}}" style="height:240px;width:100%;"alt=""></a>
				<div class="post-body">
					<div class="post-category">
						<a href="{{ route('detail', $item->slug )}}">{{ $item->category->name }}</a>
					</div>
					<h3 class="post-title"><a href="{{ route('detail', $item->slug )}}">{{ $item->judul }}</a></h3>
					<ul class="post-meta">
						<li><a href="author.html">{{ $item->users->name }}</a></li>
						{{-- <li> {{ ($item->created_at)->translatedFormat('d F Y') }}</li> Tanggal Indonesia--}}
						<li> {{ ($item->created_at)->diffForHumans() }}</li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
		{{-- <div class="col-12 text-center">
			{{ $recentPost->links() }}
		</div> --}}
	</div>
</div>

@endsection	

	