<link href="{{ $assetPath }}/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ $assetPath }}/css/font-awesome.min.css" rel="stylesheet">
<link href="{{ $assetPath }}/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="{{ $assetPath }}/css/skins/skin-{{ \Config::get('admin.layout.skin') }}.min.css" rel="stylesheet" type="text/css" />
<link href="{{ $assetPath }}/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

@foreach(\Config::get('admin.includes.css') as $script)
      <link href="{{ $script }}" rel="stylesheet" type="text/css" />
@endforeach
@foreach($_ctrl->getCss()->unique() as $script)
      <link href="{{ $script }}" rel="stylesheet" type="text/css" />
@endforeach
