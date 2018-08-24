<div class="box @isset($box_class){{ $box_class }}@endisset ">
    @isset($header)
        <div class="box-header with-border">
            <h3 class="box-title">{{ $title }}</h3>
            @isset($box_tools)
                <div class="pull-right box-tools">
                    {{ $box_tools }}
                </div>
            @endisset
        </div>
    @endisset

    <div class="box-body @isset($body_class){{ $body_class }}@endisset ">
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="box-footer">
            {!! $footer !!}
        </div>
    @endisset
</div>
