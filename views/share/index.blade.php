@extends('share.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<!-- <script src="path/to/jquery.js"></script> -->
<!-- <script src="path/to/popper.js"></script> -->
<!-- <script src="path/to/bootstrap.js"></script> -->
<!-- <script src="path/to/bootstrap-confirmation.js"></script> -->

<!-------------------------------------------------PAGINATOR--------------------------------------------------------->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<!------------------------------------------------------------------------------------------------------------------->

<!-------------------------------------------------BUTTON EDIT AND NEW------------------------------------------------>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

 
       <script type="text/javascript">
         
          $(document).ready(function() {
            
             $('.editbtn').on('click', function(){

                $('#shareeditmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function() {
                      return $(this).text();    
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#share_name').val(data[1]);
                $('#share_price').val(data[2].replace(".",""));
                $('#share_qty').val(data[3]);

             });
          
             $('#editFormID').on('submit', function(e) {
                 e.preventDefault();

                 var id = $('#id').val();

                 $.ajax({
                     type: "PATCH",
                     url: "shares/"+id,
                     data: $('#editFormID').serialize(),
                     success: function (response) {
                        console.log(response);
                        $('#shareeditmodal').modal('hide');
                        alert('Success UPDATE');
                        location.reload();
                     }, 
                     error: function(error) {
                             console.log(error);
                             $('#shareeditmodal').modal('hide');////
                             location.reload();  /////
                     }
                 });

             });
         
           });

       </script>
       
<!-------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------START OF MODAL (INSERT)------------------------------------------------->
<!-- Modal -->
<div class="modal fade" id="shareaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Share</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
            
         <form method="post" action="{{ route('shares.store') }}" id="addform">
              @csrf
              <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" name="share_name" required />
              </div>
              <div class="form-group">
                  <label for="price">Price:</label>
                  <input type="text" class="form-control" name="share_price" required pattern="[0-9]{1,}" />
              </div>
              <div class="form-group">
                  <label for="quantity">Quantity:</label>
                  <input type="text" class="form-control" name="share_qty" required pattern="[0-9]{1,}" />
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Cadastrar</button>
                &nbsp;<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> 
              <!--&nbsp;&nbsp;&nbsp;<a href="http://127.0.0.1:8000/shares" class="btn btn-primary">&nbsp;Listar&nbsp;</a>-->
             </form>

      </div>
      
    </div>
  </div>
</div>


    <script type="text/javascript">
      
      /* $(document).ready(function () {

          $('addform').on('submit', function(e){
               e.preventDefault();

               $ajax({
                    
                  type: "POST",  
                  //url: "/shareadd",
                  url: "/shares/create",
                  data: $('addform').serialize(),
                  success: function (response) {
                      console.log(response)
                      $('shareaddmodal').modal('hide')
                      alert('data saved'); 

                  },
                  error: function(error){
                          console.log(error)
                          alert('not saved'); 
                  }
                    

               })

          });

       });  */

    </script>

<!-----------------------------------------------END OF MODAL (INSERT)----------------------------------------------->

<!--------------------------------------------START OF MODAL (UPDATE)------------------------------------------------>
<!-- Modal -->
<div class="modal fade" id="shareeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Share</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      
        <form id="editFormID">  
           
            @method('PATCH')
            @csrf
             
            <input type="hidden" id="id" name="id">

            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="share_name" name="share_name" value='' />
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="text" class="form-control" id="share_price" name="share_price" value='' />
            </div>
            <div class="form-group">
              <label for="quantity">Quantity:</label>
              <input type="text" class="form-control" id="share_qty" name="share_qty" value='' />
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            &nbsp;<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> 
        </form>

      </div>
  
    </div>
  </div>
</div>

<!---------------------------------------------END OF MODAL (UPDATE)--------------------------------------------------->

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <table class="table table-striped" border="0" id="dtBasicExample">
    <thead>
        <tr>
          <td><!--<b>ID>>1--></td>
          <td><b>Share Name</td>
          <td><b>Price R$</td>
          <td><b>Quantity</td>
          <td align="right">
             <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#shareaddmodal">
                Novo
             </button>
             <!----<a href="http://127.0.0.1:8000/shares/create" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;Novo&nbsp;&nbsp;&nbsp;</a>--------->
          </td>
          <td>
          </td>
        </tr>
    </thead>

    <tbody>
        @foreach($shares as $share)
        <tr>
            <td width="3%"><font color="white">{{$share->id}}</font></td>
            <td>{{$share->share_name}}</td>
            <!--<td>{{$share->share_price}}</td>-->
            <td><?php echo number_format($share->share_price, 0, ',', '.'); ?></td>
            <td>{{$share->share_qty}}</td>
            <td align="right">
                <!--<a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary btn-bg edit">&nbsp;Editar&nbsp;</a>-->
                <button type="button" class="btn btn-primary btn-sm editbtn" data-toggle="modal">
                     &nbsp;&nbsp;Editar&nbsp;&nbsp;
                </button>
            </td>
            <td align="left">
                <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Deseja mesmo deletar?');">
                     &nbsp;Deletar&nbsp;</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

  </table>

</div>
  
<br><br>

<script type="text/javascript">
          $(document).ready(function () {
            //$('#dtBasicExample').DataTable();
          
            $('#dtBasicExample').dataTable( {
               "order": [[ 1, 'asc' ]]
            } );

            $('.dataTables_length').addClass('bs-select');
          });
</script>

@endsection