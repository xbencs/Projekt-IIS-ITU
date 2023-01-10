{{--Created by Filip Lorenc--}}
<!DOCTYPE html>
<x-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<html>
<body>
@include('partials._hero')
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Your feedback
        </div>
        <div class="card-body">
  
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="4">
                        List of feedback posts
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#postModal">
                          Create Post
                        </button>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>points</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->points }}</td>
                </tr>
                @endforeach
            </table>
  
        </div>
    </div>
</div>
  

<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create feedback post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form >
  
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
    
            <div class="mb-3">
                <label for="titleID" class="form-label">Title:</label>
                <input type="text" id="titleID" name="name" class="form-control" placeholder="Name" required="">
            </div>
  
            <div class="mb-3">
                <label for="bodyID" class="form-label">Body:</label>
                <textarea name="body" class="form-control" id="bodyID"placeholder="Body of your feedback"></textarea>
            </div>
            <div class="mb-3">
                <label for="pointsID" class="form-label">Points:</label>
                <textarea name="Points" class="form-control" id="pointsID"placeholder="points 1-10"></textarea>
            </div>
     
            <div class="mb-3 text-center">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
    
        </form>
      </div>
    </div>
  </div>
</div>
     
</body>
  
<script type="text/javascript">
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $(".btn-submit").click(function(e){
    
        e.preventDefault();
     
        var title = $("#titleID").val();
        var body = $("#bodyID").val();
        var points = $("#pointsID").val();
     
        $.ajax({
           url:"{{ route('posts.store') }}",
           type:'POST',
           data:{title:title, body:body, points:points},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    alert(data.success);
                    location.reload();
                }else{
                    printErrorMsg(data.error);
                }
           }
        });
    
    });
  
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
  
</script>
</html>
</x-layout>