<li class="embed">@include($block_detail['data']['component']['component']['folder'].'.'.$block_detail['data']['component']['file'])
    @if(isset($block_detail['children']))
    <ul>
        @foreach($block_detail['children'] as $children)
			@include('template_cat._layouts.block._block_detail',['block_detail'=>$children])
        @endforeach
    </ul>
    @endif
</li>
