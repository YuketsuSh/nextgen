@extends('layouts.base')
@section('title', trans('messages.home'))

@section('app')
<main>
<section class="main-profileblock">
    <div class="container lazy page-banner" style="background-image: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}')">
    <div class="page-banner__content">
    @if($message)
        {{ $message }}
    @endif
    </div> 
    @auth
    <div class="profile-block">
        <img src="{{ Auth::user()->getAvatar() }}" alt="" class="profile-block__skin"> 
        <p class="profile-block__nickname" _msttexthash="135603" _msthash="155">{{ Auth::user()->name }}</p> 
        <hr class="profile-block__line"> 
        <div class="profile-block__balance">
            @if(use_site_money())
            <img class="lazy" src="{{ theme_asset('images/coins/coin.png') }}" alt="" width="24px" height="24px"> 
            <p _msttexthash="4368" _msthash="154">{{ number_format(auth()->user()->money,2) }}</p>
            @endif
        </div> 
        <div class="d-flex flex-nowrap justify-content-between align-items-center gap-10px w-100">
            @include('elements.notifications')
            <a href="{{ route('profile.index') }}" class="button button__icon w-100 px-1">
                <i class="bi bi-person-fill"></i>
            </a> 
            @if(Auth::user()->hasAdminAccess())
            <a href="{{ route('admin.dashboard') }}" class="button button__icon w-100 px-1">
                <i class="bi bi-gear-fill"></i>
            </a>
            @endif
        </div>
        @if (use_site_money()) 
        <a class="button button__normal w-100" href="/shop/offers" _msttexthash="782158" _msthash="153">Réapprovisionnez votre compte</a> 
        @endif
     
        <a class="profile-block__logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" _msttexthash="197938" _msthash="21"><i class="bi bi-box-arrow-right"></i></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    @else
    <div class="profile-block">
        <img class="lazy" src="{{ theme_asset('images/icons/profile-block-question-mark.svg') }}" alt=""> 
        <hr class="profile-block__line"> 
        <div class="d-flex flex-column gap-5px w-100">       
            <p class="profile-block__text">Connectez-vous</p> 
        </div> 
        <a href="{{ route('login') }}" class="button button__normal w-100">S'identifier</a>
    </div>
    @endauth
</div> 
</section>

<section class="main-slider-cover">
    <div class="main-slider">

        <div class="main-slider-for">
            <div class="main-slide-for">
                <img class="lazy" src="{{ theme_asset('images/sliders/home1-slide10.jpg') }}" alt="">
                <div class="container">
                    <div class="slide-info">
                        <h3>Slider1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque eaque ut ad aliquam, alias voluptatem!</p>
                        <a href="#">read more</a>
                    </div>
                </div>
            </div>
            <div class="main-slide-for">
            <img class="lazy" src="{{ theme_asset('images/sliders/home1-slide4.jpg') }}" alt="">
            <div class="container">
                <div class="slide-info">
                    <h3>Slider2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmmpor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#">read more</a>
                </div>
            </div>
        </div>

        <div class="main-slide-for">
            <img class="lazy" src="{{ theme_asset('images/sliders/home1-slide5.jpg') }}" alt="">
            <div class="container">
                <div class="slide-info">
                    <h3>Slider3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque eaque ut ad aliquam, alias voluptatem!</p>
                    <a href="#">read more</a>
                </div>
            </div>
        </div>

        <div class="main-slide-for">
            <img class="lazy" src="{{ theme_asset('images/sliders/home1-slide12.jpg') }}" alt="">
            <div class="container">
                <div class="slide-info">
                    <h3>Slider4</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque eaque ut ad aliquam, alias voluptatem!</p>
                    <a href="#">read more</a>
                </div>
            </div>
        </div>

    </div>

    <div class="main-slider-nav">

        <div class="main-slide-nav">
            <span>1</span>
            <div class="img-cover">
                <img class="lazy" src="{{ theme_asset('images/sliders/home1-slide10.jpg') }}" alt="">
            </div>
        </div>

        <div class="main-slide-nav">
            <span>2</span>
            <div class="img-cover">
                <img class="lazy" src="{{ theme_asset('images/sliders/home1-slide4.jpg') }}" alt="">
            </div>
        </div>

        <div class="main-slide-nav">
            <span>3</span>
            <div class="img-cover">
                <img class="lazy" src="{{ theme_asset('images/sliders/home1-slide5.jpg') }}" alt="">
            </div>
        </div>

        <div class="main-slide-nav">
            <span>4</span>
            <div class="img-cover">
                <img class="lazy" src="{{ theme_asset('images/sliders/home1-slide12.jpg') }}" alt="">
            </div>
        </div>

    </div>
</div>
</section>


<section class="s-blog">
    <div class="container s-anim">
        <h2>{{ trans('messages.news') }}</h2>
        @if ($posts->isEmpty())
        <div class="alert alert-danger"><i class="bi bi-x-circle d-none d-md-inline-block"></i> Aucune nouveauté disponible.</div>
        @endif
        <p class="slogan">{!! theme_config('news_description') !!}</p>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-12 col-md-4 post-item">
                <div class="prod-thumbnail">
                    <a href="{{ route('posts.show', $post->slug) }}"><img class="lazy" src="{{ $post->imageUrl() }}" data-src="{{ $post->imageUrl() }}" alt="img"></a>
                </div>
                <div class="post-content">
                    <div class="meta top">
                        <span class="post-by">{{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}</span>
                    </div>
                    <h5 class="title"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h5>
                    <div class="meta bottom">
                        <span class="post-comments">
                            <p>{{ Str::limit(strip_tags($post->content), 120) }}</p>
                        </span>
                    </div>
                    <a href="{{ route('posts.show', $post->slug) }}" class="btn">Lire plus</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
</main>
@endsection