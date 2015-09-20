<li {!! ($block_detail['data']['default']==1 && !isset($page)) || $page->id == $block_detail['data']['id'] ? 'class="active"' : '' !!}>
<a {!! $block_detail['data']['link_target']!='_self'?'target="'.$block_detail['data']['link_target'].'"':'' !!}
href="{!! $block_detail['data']['content_type']=="link"?$block_detail['data']['external_link']:route('content_page',[str_slug($block_detail['data']['menu_title']),$block_detail['data']['id']]) !!}">
{!! $block_detail['data']['menu_icon']!=''?'<i class="'.$block_detail['data']['menu_icon'].'"></i>':'' !!}
{!! $block_detail['data']['menu_image']!=''?'<img src="'.$block_detail['data']['menu_image'].'" />':'' !!}
{{ $block_detail['data']['menu_title'] }} </a>
@if(isset($block_detail['children']))
    <ul>
        @foreach($block_detail['children'] as $children)
            @include('template_cat._layouts.block._block_detail',['block_detail'=>$children])
        @endforeach
    </ul>
    @endif
    </li>
