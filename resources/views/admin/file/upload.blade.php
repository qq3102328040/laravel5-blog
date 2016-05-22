<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h2>上传文件</h2>
        <form action="{{ action('Admin\FileController@postUpload') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-2 control-label">File input</label>
                <div class="col-sm-10">
                    <input type="file" name="file" id="exampleInputFile">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">使用时间命名</label>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
      <span class="input-group-addon">
        <input type="radio" name="method" value="1" checked="true">
      </span>
                            <div></div>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">使用默认文件名</label>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
      <span class="input-group-addon">
        <input type="radio" name="method" value="2">
      </span>
                            <div></div>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">自定义命名</label>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
      <span class="input-group-addon">
        <input type="radio" name="method" value="3">
      </span>
                            <input type="text" name="name" class="form-control">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">上传</button>
                </div>
            </div>
        </form>
    </div>

    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>