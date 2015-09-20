@if(in_array($user_role_id,unserialize($item['access'])))
    @unless($item['list_embed'])
        <div class="widget">
            @if($item['title_visibility'])
              <h4 class="title"> <span>{{ $item['title'] }}</span> </h4>
            @endif
            <div class="widget-content">
                @endunless
                <ul>
                    @foreach($item['block_detail'] as $block_detail)
                        @include('template_example._layouts.block._block_item',['block_detail'=>$block_detail])
                    @endforeach
                </ul>
                @unless($item['list_embed'])
            </div>
        </div>
    @endunless
@endif
