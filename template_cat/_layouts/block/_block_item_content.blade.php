<li class="embed">
    @if($block_detail['data']['content']['title_visibility'])
    <h4 class="title"> <span>{{ $block_detail['data']['content']['title'] }}</span> </h4>
    @endif
    <p>{{ $block_detail['data']['content']['content'] }}</p>
    @if(isset($block_detail['children']))
        <ul>
            @foreach($block_detail['children'] as $children)
                @include('template_example._layouts.block._block_detail',['block_detail'=>$children])
            @endforeach
        </ul>
    @endif
</li>
