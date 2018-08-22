@if (count($breadcrumbs))
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            <li @if ($loop->last) class="active" @endif>
                    @if ($breadcrumb->url)
                        <a href="{{ $breadcrumb->url }}">
                    @else
                        <span>
                    @endif
                    @if ($loop->first)
                        @lang('admin.icon.dashboard')
                    @endif
                    {{ $breadcrumb->title }}
                    @if ($breadcrumb->url)
                        </a>
                    @else
                        </span>
                    @endif
            </li>
        @endforeach
    </ol>
@endif
