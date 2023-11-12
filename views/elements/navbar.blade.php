<header class="header">
		<div class="container">
			<a href="#" class="nav-btn">
				<span></span>
				<span></span>
				<span></span>
			</a>
			<div class="row align-items-center">
				<div class="col-12 col-sm-6 col-lg-3 logo-item">
					<a href="/" class="logo" style="max-width: 141px; max-height: 36px;"><img src="{{ site_logo() }}" alt="{{ site_name() }}"></a>
				</div>
				<div class="col-6 nav-menu-cover">
					<nav class="nav-menu">
						<ul class="nav-list">
                            @foreach($navbar as $element)
                                @if($loop->index < ($loop->count))
                                    @if(!$element->isDropdown())
							            <li class="@if($element->isCurrent()) active @endif">
								            <a href="{{ $element->getLink() }}">{{ $element->name }}</a>
							            </li>
                                    @else
                                    <li class="dropdown">
                                        <a href="#">{{ $element->name }} <i class="bi bi-chevron-down" aria-hidden="true"></i></a>
                                        <ul>
                                        @foreach($element->elements as $childElement)
                                            <li><a class="@if($childElement->isCurrent()) text-primary @endif" href="{{ $childElement->getLink() }}">{{ $childElement->name }}</a></li>
                                        @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                @endif
                            @endforeach
						</ul>
					</nav>
				</div>
				<div class="col-12 col-sm-6 col-lg-3">
					<ul class="header-icon">
                        @auth
						<li>
							<a class="icon" href="{{ route('profile.index') }}">
								<i class="bi bi-person-fill" aria-hidden="true"></i>
							</a>
						</li>
						<li class="basket">
							<a class="icon" href="{{ route('shop.cart.index') }}">
								<i class="bi bi-cart" aria-hidden="true"></i>
                                <span>{{ Azuriom\Plugin\Shop\Cart\Cart::fromSession(request()->session())->count() }}</span>
							</a>
						</li>
                        @else
                        <li>
							<a class="icon" href="{{ route('login') }}">
								<i class="bi bi-person-fill" aria-hidden="true"></i>
							</a>
						</li>
                        @endauth
					</ul>
				</div>
			</div>
		</div>
	</header>