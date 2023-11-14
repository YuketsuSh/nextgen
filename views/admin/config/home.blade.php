@push('footer-scripts')
    <script>
        function addCommandIconMenu(el) {
            let i = 1;
            el.addEventListener('click', function () {
                const element = el.closest('.slider');
                element.parentNode.removeChild(element);
                document.getElementById('sliders').querySelectorAll('.slider').forEach(function (el) {
                    let count = i++
                    el.querySelector('.card-title').innerHTML = 'Slider ' + count;
                })
            });
        }

        document.querySelectorAll('.command-remove-slider').forEach(function (el) {
            addCommandIconMenu(el);
        });

        document.getElementById('addCommandButton').addEventListener('click', function () {
            let i = 1;
            let input = `@include('admin.pattern.slider')`;

            const newElement = document.createElement('div');
            newElement.classList.add('slider', 'col-xl-4', 'col-lg-6', 'my-3')
            newElement.innerHTML = input
            addCommandIconMenu(newElement.querySelector('.command-remove-slider'));

            document.getElementById('sliders').appendChild(newElement);
            document.getElementById('sliders').querySelectorAll('.slider').forEach(function (el) {
                let count = i++
                el.querySelector('.card-title').innerHTML = 'Slider ' + count;
                el.querySelector('select').setAttribute('data-image-preview-select', 'filePreview-' + count)
                el.querySelector('img').setAttribute('id', 'filePreview-' + count)
                imagePreviewSelect(el.querySelector('select'))
            })

        });

        function configFormSlider(i) {
            document.getElementById('sliders').querySelectorAll('.form-row').forEach(function (el) {
                el.querySelectorAll('input').forEach(function (input) {
                    input.name = input.name.replace('{index}', i.toString());
                });
                el.querySelectorAll('select').forEach(function (select) {
                    select.name = select.name.replace('{index}', i.toString());
                });

                i++;
            });
        }
    </script>
@endpush
<div class="card-header">
    <h3 class="m-0 font-weight-bold text-primary">{{ trans('theme::nextgen.home.title') }}</h3>
</div>
@php
    $homeItemsIpServer = [
                    'url'=>route('home'),
	                'key'=> 'home',
                    'value' => 'ip-server',
                    'filedsBuilder' => [
                        ['type'=>'input','value' => 'ip'],
                        ['type'=>'image','value' => 'media','label' =>1],
                        ['type'=>'image','value' => 'mediaServeOn','label' =>1],
                        ['type'=>'image','value' => 'mediaServeOff','label' =>1],
                        ['type'=>'checkbox','value' => 'hidden'],
                        ]
                    ];

    $homeItemsDownload = [
                    'url'=>route('home'),
		            'key'=> 'home',
                    'value' => 'download',
                    'filedsBuilder' => [
                        ['type'=>'input','value' => 'name'],
                        ['type'=>'input','value' => 'url'],
                        ['type'=>'checkbox','value' => 'hidden'],
                        ]
                    ];
    $homeItemsCountResgister = [
                    'url'=>route('home'),
		                    'key'=> 'home',
                            'value' => 'count-register',
                            'filedsBuilder' => [
                                ['type'=>'image','value' => 'media'],
                                ['type'=>'checkbox','value' => 'hidden'],
                                ]
                            ];
    $homeItemsDiscord = [
                    'url'=>route('home'),
                            'key'=> 'home',
                            'value' => 'discord',
                            'filedsBuilder' => [
								['type'=>'input','value' => 'id'],
								['type'=>'input','value' => 'url'],
                                ['type'=>'select','value' => 'style','option' => [
                                    0 => 'Style N°1',
                                    1 => 'Style N°2',
                                    ]
                                ],
                                ['type'=>'checkbox','value' => 'hidden'],
                            ]
                        ];
    $homeItemsArticle = ['url'=>route('home'),'key'=> 'home','value' => 'article',
                            'filedsBuilder' => [
                                ['type'=>'select','value' => 'style','option' => [
                                    0 => 'Style N°1',
                                    1 => 'Style N°2',
                                    2 => 'Style N°3',
                                    ]
                                ],
                                ['type'=>'input','value' => 'numberMax'],
                            ]];

    $homeItemsLogin = ['url'=>route('home'),'key'=> 'home','value' => 'login',
                            'filedsBuilder' => [
                                ['type'=>'checkbox','value' => 'hidden'],
                            ]];
    $homeBannerArticle = ['url'=>route('home'),'key'=>'home', 'value' => 'article'];
    $homeBannerInformation = ['url'=>route('home'),'key'=>'home', 'value' => 'information'];
    $homeBannerLogin = ['url'=>route('home'),'key'=>'home', 'value' => 'login'];
@endphp
<div class="card-body">
    {!! trans('theme::nextgen.config.info-eye') !!}
    <fieldset class="form-group">
        <legend>{{trans('theme::nextgen.home.slider.title')}}</legend>
        <div class="small font-italic mb-2">{!! trans('theme::nextgen.home.slider.info')!!}</div>
        <button type="button" id="addCommandButton" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
        </button>
        <div id="sliders" class="row">
            @forelse( theme_config('sliders') ?? [] as $slider )

                <div class="slider col-xl-4 col-lg-6 my-3">
                    @include('admin.pattern.slider')
                </div>
            @empty
                <div class="slider col-xl-4 col-lg-6 my-3">
                    @include('admin.pattern.slider')
                </div>
            @endforelse
        </div>
    </fieldset>
    <hr class="my-3 sidebar-divider">
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            @include('admin.pattern.items' ,$homeItemsIpServer)
        </div>
        <div class="col-xl-4 col-lg-6">
            @include('admin.pattern.items',$homeItemsDownload)
        </div>
        <div class="col-xl-4 col-lg-6">
            @include('admin.pattern.items',$homeItemsCountResgister)
        </div>
    </div>
    <hr class="my-3 sidebar-divider">
    <div class="row js-row-builder">
        @include('admin.pattern.builder-items',['arrayBanner'=>$homeBannerArticle, 'arrayItems' => $homeItemsArticle])
        @include('admin.pattern.builder-items',['arrayBanner'=>$homeBannerInformation, 'arrayItems' => $homeItemsDiscord])
        @include('admin.pattern.builder-items',['arrayBanner'=>$homeBannerLogin, 'arrayItems' => $homeItemsLogin])

    </div>
</div>