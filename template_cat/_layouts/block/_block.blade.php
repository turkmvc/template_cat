@if(in_array($user_role_id,unserialize($item['access'])))
    @unless($item['list_embed'])
        <div class="block">
            @if($item['title_visibility'])
              <h3>{{ $item['title'] }}</h3>
            @endif
            <div class="content">
                @endunless
                <ul>
                    @foreach($item['block_detail'] as $block_detail)
                        @include('template_cat._layouts.block._block_item',['block_detail'=>$block_detail])
                    @endforeach
                </ul>
                @unless($item['list_embed'])
            </div>
        </div>
    @endunless
@endif