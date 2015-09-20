<section class="bg-white p20">
    <div class="row">
        <div class="col-md-12">
            @if($content['title_visibility'])
                <h2 class="title">{!! $content['title'] !!}</h2>
            @endif
            {!! $content['content'] !!}
        </div>
    </div>
</section>