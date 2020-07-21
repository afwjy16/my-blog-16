@include('template_backend/header')
@include('template_backend/navbar')
@include('template_backend/sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('sub-judul')</h1>
        </div>
        @yield('content')
    </section>
</div>

@include('template_backend/footer')