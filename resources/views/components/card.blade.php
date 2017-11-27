<div class="panel panel-default">
    <div class="panel-heading"><h4 class="panel-title">{{ $title }}</h4></div>
    <div class="panel-body">
        {{ $slot }}
    </div>
    @isset($footer)
    <div class="panel-footer">{{ $footer }}</div>
    @endisset
</div>