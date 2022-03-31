<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container" style="margin-top:15%;">
       <div class="row">
    <div class="col-8">
      <input type="text" class="form-control" name="task" id ="task"placeholder="Add task"><button class="btn btn-primary" id="savetask">ADD</button>
    </div>
      </div>
   
   
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

$('#savetask').click(function(){
  var task = $('#task').val();
  $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
  $.ajax({
    type:"post",
    url:"{{url('/savetask')}}",
    data:{
      task:task
    },
    dataType:'json',
    success: function(data){
      console.log(data);
      var obj =  JSON.parse(JSON.stringify(data))
        // alert(obj);
         alert(obj.data);
           },
           error:function(error){
            
              console.log(error)
           }


  })
// alert(task);
});


</script>