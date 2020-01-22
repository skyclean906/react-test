<!-- welcome.blade.php -->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>React Test</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="position: fixed; width:100%; height:100%">
<div class="row" style="height:100%">
  <div class="left-bar col-sm-2" style="background:#F3F3F3; height:100%; padding-left: 0px">
    <div class="row" style="border-bottom: 1px solid #D7D9E0; height: 60px; padding:20px 25px">
      <div class="col-6">
        <p class="text-type-1" style="">FILES</p>
      </div>
      <div class="col-6">
        <p class="text-type-2" onclick="upload_click()" style="">Upload <i class="fa fa-upload" style="margin-left: 10px; font-size: 12px;line-height: 14px;color: #9CA0B2;"></i></p>
        <form id="uploadform" action="/uploadFile" method="post" encType="multipart/form-data" style="visibility:hidden">
          {{ csrf_field() }}
          <input type="file" name="fileToUpload" id="fileToUpload">
        </form>
      </div>
    </div>
    <div class="documents-div row" style="padding:5px 10px 15px 40px;">
      @foreach ($files as $file)
      <div class="document-title-card @if ($file['file'] == $active_file['file']) active @endif" data-ext="{{$file['ext']}}" data-index="{{$file['key']}}" onclick="location.href='/file/{{$file['key']}}';">
        <p class="text-type-3" style="">Document #{{$file['key']}}</p>
        <p class="text-type-4" style="">Me. Dustin</p>
      </div>
      @endforeach
    </div>
  </div>
  <div class="main-view col-sm-10" style="padding-left: 0px; height: 100%">
    <div id="app" data-filename="{{$active_file['file']}}" data-fileext="{{$active_file['ext']}}" data-fileindex="{{$active_file['key']}}"></div>
  </div>
</div>
<script src="{{asset('js/app.js')}}" ></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
function upload_click(){
  $('#fileToUpload').click();
}

$('#fileToUpload').change(function(){
  uploadFile();
});

function uploadFile(){
  const selectedFile  = document.getElementById('fileToUpload').files[0];
  if (selectedFile.type == "") {
    alert('Not available file format! please upload again.')
    return;
  }

  $('#uploadform').submit();
}
</script>
</body>
</html>
