@extends('share.layout')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
  .uper {
    margin-top: 20px;
  }
</style>

    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    	border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
    .form-image-upload{
        background: #e8e8e8 none repeat scroll 0 0;
        padding: 15px;
    }
    </style>


<div class="uper">

    
    <h4>Image Gallery</h4>
    <form action="{{ url('image-gallery') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">


        {!! csrf_field() !!}


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Erros ao Upload!<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


        <div class="row">
            <div class="col-md-5">
                <strong>Título:</strong>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-5">
                <strong>Imagem:</strong>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>


    </form> 


    <div class="row">
        <div class='list-group gallery'>

            @if($images->count())
                @foreach($images as $image)
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
                        <img class="img-responsive" alt="" src="/images/{{ $image->image }}" />
                        <div class='text-center'>
                            <small class='text-muted'>{{ $image->title }}</small>
                        </div> <!-- text-center / end -->
                    </a>
                    <form action="{{ url('image-gallery',$image->id) }}" method="POST">
                      <input type="hidden" name="_method" value="delete">
                      {!! csrf_field() !!}
                      <button type="submit" class="close-icon btn btn-danger" onclick="return confirm('Deseja mesmo deletar?');">
                          <i class="glyphicon glyphicon-remove"></i>
                      </button>
                    </form>
                </div> <!-- col-6 / end -->
                @endforeach
            @endif

        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->

<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>

@endsection