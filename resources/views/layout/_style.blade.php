<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="{{ $assetPath }}/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="{{ $assetPath }}/css/skins/skin-{{ \Config::get('admin.layout.skin') }}.min.css" rel="stylesheet" type="text/css" />
@foreach(\Config::get('admin.includes.css') as $script)
      <link href="{{ $script }}" rel="stylesheet" type="text/css" />
@endforeach