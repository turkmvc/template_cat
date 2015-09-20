<li class="embed">@include('template_example._layouts.block._block',['item'=>$block_detail['data']])
    @if(isset($block_detail['children']))
        <ul>
            @foreach($block_detail['children'] as $children)
                @include('template_example._layouts.block._block_detail',['block_detail'=>$children])
            @endforeach
        </ul>
    @endif
</li>
