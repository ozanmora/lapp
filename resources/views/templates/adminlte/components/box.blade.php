<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
        @isset($box_tools)
            <div class="pull-right box-tools">
                {{ $box_tools }}
            </div>
        @endisset
    </div>

    <div class="box-body">
        {{ $slot }}
    </div>
</div>
