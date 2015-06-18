<!-- REQUIRED JS SCRIPTS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ $assetPath }}/js/app.min.js" type="text/javascript"></script>
<script src="{{ $assetPath }}/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ $assetPath }}/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
@foreach(\Config::get('admin.includes.js') as $script)
    <script src="{{ $script }}" type="text/javascript"></script>
@endforeach