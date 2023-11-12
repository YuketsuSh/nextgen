<div class="container">
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-3 footer-info">
            <h5>@lang('theme::nextgen.footer.about')</h5>
            <p>{!! theme_config('footer_description') !!}</p>
        </div>
        <div class="col-6 col-sm-4 col-lg-2 blok-link">
        @if(theme_config('discord-id'))
        <iframe class="discord" src="https://discord.com/widget?id={{ theme_config('discord-id') }}&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
        @endif

        @if(theme_config('twitter'))
            <div class="twitter-widget shadow">
                <a class="twitter-timeline" data-theme="dark" data-height="500" href="{{ theme_config('twitter') }}">Tweets by Azuriom</a>
            </div>
        @endif
        </div>
    </div>
    <div class="footer-bottom">
        <div class="row align-items-center">
            <div class="col-12 col-md-3">
                <a href="/" class="logo footer-logo"><img src="{{ site_logo() }}" alt="logo"></a>
            </div>
            <div class="col-12 col-md-6">
                <ul class="footer-menu">
                @foreach(theme_config('footer_links') ?? [] as $link)
                    <li><a href="{{ $link['value'] }}">{{ $link['name'] }}</a></li>
                @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-3">
                <ul class="soc-link">
                @foreach(social_links() as $link)
                    <li><a target="_blank" href="{{ $link->value }}"><i class="{{ $link->icon }" aria-hidden="true"></i></a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright">
        {!! setting('copyright') !!}
        <p>Theme by <a class="quantiumflow" href="https://discord.gg/quantiumflow" target="_blank">QuantiumFlow</a> ©</p>
        <p class="azuriom">@lang('messages.copyright')</p>
    </div>
</div>