@if($block_detail['type']=="page")
    @if(in_array($user_role_id,unserialize($block_detail['data']['access'])))
        @if($block_detail['data']['content_embed'])
            @if($block_detail['data']['content_type']=="content")
                @if(in_array($user_role_id,unserialize($block_detail['data']['content']['access'])))
                    @include('template_example._layouts.block._block_item_content',['block_detail'=>$block_detail])
                @endif
            @elseif($block_detail['data']['content_type']=="component")
                @include('template_example._layouts.block._block_item_component',['block_detail'=>$block_detail])
            @elseif($block_detail['data']['content_type']=="link")
                @include('template_example._layouts.block._block_item_link',['block_detail'=>$block_detail])
            @endif
        @else
            @include('template_example._layouts.block._block_li',['block_detail'=>$block_detail])
        @endif
    @endif
@elseif($block_detail['type']=="content")
    @if(in_array($user_role_id,unserialize($block_detail['data']['access'])))
        <li class="embed">
            @if($block_detail['data']['title_visibility'])
            <h4 class="title"> <span>{{ $block_detail['data']['title'] }}</span> </h4>
            @endif
            <p>{{ $block_detail['data']['content'] }}</p>
            @if(isset($block_detail['children']))
                <ul>
                    @foreach($block_detail['children'] as $children)
                        @include('template_example._layouts.block._block_detail',['block_detail'=>$children])
                    @endforeach
                </ul>
            @endif
        </li>
    @endif
@elseif($block_detail['type']=="component-file")
    <li class="embed">@include($block_detail['data']['component']['folder'].'.'.$block_detail['data']['file'])
        @if(isset($block_detail['children']))
            <ul>
                @foreach($block_detail['children'] as $children)
                    @include('template_example._layouts.block._block_detail',['block_detail'=>$children])
                @endforeach
            </ul>
        @endif
    </li>
@elseif($block_detail['type']=="block")
    @include('template_example._layouts.block._block_item_block',['block_detail'=>$block_detail])
@endif
