<?php
$messages = \Session::get('adminMessages');
?>

@foreach(array('danger', 'warning', 'success', 'info') as $type)
    @if(isset($messages[$type]))
        @foreach($messages[$type] as $message)
            <div class="callout callout-{{ $type }} lead">
                <h4>{{ trans('admin.message.'.$type) }}</h4>
                <p>{{ $message }}</p>
            </div>
        @endforeach
    @endif
@endforeach