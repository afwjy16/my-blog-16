    <div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				@foreach ($bannerPost as $item)
					<div class="{{ ($loop->first == '1') ? 'col-md-8 hot-post-left' : 'col-md-4 hot-post-right' }}">
						<div class="post post-thumb">
							<a class="post-img" href="{{ route('detail', $item->slug )}}">
									<img src="{{ asset($item->gambar)}}" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="{{ route('detail', $item->slug )}}">{{ $item->category->name }}</a>
								</div>
								<h3 class="post-title title-lg"><a href="{{ route('detail', $item->slug )}}">{{ $item->judul }}</a></h3>
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
	</div>
