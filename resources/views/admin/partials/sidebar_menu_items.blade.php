@if (count($items) > 0)
    @foreach($items as $item)
        <li@lm-attrs($item) @if($item->hasChildren())class="treeview"@endif @lm-endattrs>
            @if($item->link)
                <a@lm-attrs($item->link) @lm-endattrs href="{!! $item->url() !!}">
                    @if (stripos($item->title, 'fa') === FALSE)
                        @lang('admin.icon.menu_default')
                    @endif
                    {!! $item->title !!}
                    @if($item->hasChildren())
                        <span class="pull-right-container">
                            @lang('admin.icon.menu_caret')
                        </span>
                    @endif
                </a>
            @else
                {!! $item->title !!}
            @endif
            @if($item->hasChildren())
                <ul class="treeview-menu">
                    @include('admin.partials.sidebar_menu_items', ['items' => $item->children()])
                </ul>
            @endif
        </li>
        @if($item->divider)
            <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
        @endif
    @endforeach
@endif
