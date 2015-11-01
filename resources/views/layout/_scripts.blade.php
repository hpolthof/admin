<!-- REQUIRED JS SCRIPTS -->
<script src="{{ $assetPath }}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ $assetPath }}/js/app.min.js" type="text/javascript"></script>
<script src="{{ $assetPath }}/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ $assetPath }}/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<script src="{{ $assetPath }}/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
@foreach(array_unique(\Config::get('admin.includes.js')) as $script)
    <script src="{{ $script }}" type="text/javascript"></script>
@endforeach
@foreach($_ctrl->getJs()->unique() as $script)
    <script src="{{ $script }}" type="text/javascript"></script>
@endforeach
