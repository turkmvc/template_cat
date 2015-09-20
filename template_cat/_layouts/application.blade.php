@inject('settings', 'Whole\Core\Injections\SettingsInjection')
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{!! (isset($page->title) && $page->title!="")?$page->title." - ":'' !!}{!! $settings->get()->title !!}</title>
    <meta name="keywords" content="{!! (isset($page->keywords) && $page->keywords!='')?$page->keywords:$settings->get()->meta_keywords !!}">
    <meta name="description" content="{!! (isset($page->description) && $page->description!='')?$page->description:$settings->get()->meta_description !!}">
    @if($settings->get()->favicon!="")
    <link rel="shortcut icon" href="{{ $settings->get()->favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ $settings->get()->favicon }}" type="image/x-icon">
    @endif

    {!! Html::style('assets/template_cat/css/bootstrap.min.css') !!}
    {!! Html::style('assets/template_cat/js/plugin/font-awesome/css/font-awesome.min.css') !!}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!! Html::style('assets/template_cat/css/custom.css') !!}
</head>
<body>
<header id="header" class="site_header">
    <div class="header-wrap clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <h1>{{ $settings->get()->logo_title }}</h1>
                        <a href="{{ route('master_page') }}">
							@if($settings->get()->logo!="")
								<img  alt="{{ $settings->get()->logo_title }}" src="{!! $settings->get()->logo !!}" />
							@else
								<img  src="assets/template_cat/images/logo.png" alt="Golden Boy (RIP 19.09.2015)" />
							@endif
                        </a>
                        <p>{{ $settings->get()->logo_description }}</p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="btn-menu"></div>
                    <nav id="mainnav">
                        @yield('navigation')
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="row">@yield('content_top')</div>
<div class="container">
    <div class="row">
            @unless(in_array('content_left',$hidden_fields))
                <div class="content_left col-md-3">
                  @yield('content_left')
                </div>
            @endunless
            @unless(in_array('content_main',$hidden_fields))
              <div class="@if(in_array('content_left',$hidden_fields) && in_array('content_right',$hidden_fields)){{ 'col-md-12 col-lg-12' }}
              @elseif(in_array('content_left',$hidden_fields) || in_array('content_right',$hidden_fields)){{ 'col-lg-9 col-md-9' }}
              @else{{ 'col-lg-6 col-md-6' }}@endif">
                @yield('content_main')
              </div>
            @endunless

            @unless(in_array('content_right',$hidden_fields))
            <div class="content_right col-md-3">
                @yield('content_right')
            </div>
            @endunless

            @yield('content_bottom')
    </div>
</div>
@yield('footer_top')
<footer class="footer">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @yield('footer')
        </div>
    </div>
    <div class="copy-right">
        <div class="row">
            <div class="col-md-6 text-left">{!! $settings->get()->copyright !!}</div>
            <div class="col-md-6 text-right">Bu bir <a href="#">SW Bilişim</a> Ürünüdür.</div>
        </div>
    </div>
</div>
</footer>
<a class="go-top"><i class="fa fa-chevron-up"></i></a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
{!! Html::script('assets/template_cat/js/bootstrap.min.js') !!}
{!! Html::script('assets/template_cat/custom.js') !!}
</body>
</html>