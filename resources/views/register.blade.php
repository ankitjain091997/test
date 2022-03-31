<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   
  </head>
  <body>
    <h1>Hello, world!</h1>
    <form method="POST" action="{{route('submitform')}}"enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="id"  value="{{@$register->id}}"id="hidden" placeholder="Another input">

        <div class="form-group">
          <label for="formGroupExampleInput">FIle</label>
          <input type="file" class="form-control" id ="image" name ="file" value="{{@$register->file}}"id="formGroupExampleInput" placeholder="Example input">
           @if ($errors->has('file'))

                             <span class="text-danger">{{ $errors->first('file') }}</span>

                                 @endif
          @if(@$register->file)
         <img src="/image/{{ @$register->file }}" width="100px">
         @endif
        </div>
        <div class="form-group">
           
          <label for="formGroupExampleInput2">email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{@$register->email}}"id="formGroupExampleInput2" placeholder="Another input">
           @if ($errors->has('email'))

                             <span class="text-danger">{{ $errors->first('email') }}</span>

                                 @endif
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">name</label>
            <input type="text" class="form-control" name="name" id="name"value="{{@$register->name}}"id="formGroupExampleInput2" placeholder="Another input">
             @if ($errors->has('name'))

                             <span class="text-danger">{{ $errors->first('name') }}</span>

                                 @endif
          </div>
          @if(!@$register)

          <div class="form-group">
            <label for="formGroupExampleInput2">password</label>
            <input type="password" class="form-control" id="password"name="password"id="formGroupExampleInput2" placeholder="Another input">
             @if ($errors->has('password'))

                             <span class="text-danger">{{ $errors->first('password') }}</span>

               @endif
          </div>
          @endif
        <p>Hobbies</p>
        <!-- <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="hobbies" value="dance" class="custom-control-input">
            
            <label class="custom-control-label" for="customRadio1"> dance</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="hobbies" value="yoga" class="custom-control-input">
            
            <label class="custom-control-label" for="customRadio1"> yoga</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="hobbies" value="cooking" class="custom-control-input">
            
            <label class="custom-control-label" for="customRadio1"> cooking</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="hobbies" class="custom-control-input">
            
            <label class="custom-control-label" for="customRadio1"> bloging</label>
          </div> --> 
          <label class="mt-checkbox">
            <input type="checkbox" class="hobbies" name="hobbies" value="dance"@if(@$register->hobbies == 'dance') checked @endif > dance
          </label>
          <label class="mt-checkbox">
            <input type="checkbox" class="hobbies" name="hobbies" value="yoga" @if(@$register->hobbies == 'yoga') checked @endif > yoga
          </label>
          <label class="mt-checkbox">
            <input type="checkbox" class="hobbies" name="hobbies" value="cooking" @if(@$register->hobbies == 'cooking') checked @endif > cooking
          </label>
          <label class="mt-checkbox">
            <input type="checkbox" class="hobbies" name="hobbies" value="singing" @if(@$register->hobbies =='singing')  checked @endif > singing
           @if ($errors->has('hobbies'))

                             <span class="text-danger">{{ $errors->first('hobbies') }}</span>

               @endif
          </label>
        <br>

         <button  id="create"class="btn btn-primary" >submit</button>
      </form>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <script type="text/javascript">
    $('#create').on('click',function (event) {
        
          var id = $(".hide").data('id');
          var name   = $("#name").val();
          var password = $("#password").val();
          var email   = $("#email").val();
          var image   = $("#image").val();
          var hobbies = $("#hobbies").val();
         // alert(id);

           if(name !="" && password !="" && email !="" && image !=""&& hobbies !="")
                  {
                    
            $.ajax({
            type:"POST",
            url: "{{ url('/submitform') }}",
            data: {
              id:id,
              name:name,
              password:password,
              email:email,
              image:image,
              hobbies:hobbies,
            }, 
            enctype: 'multipart/form-data',
            contentType: false,
            cache: false,
            dataType: 'json',
            success: function(res){
             window.location.reload();
            // $("#create").html('Submit');
            alert(" created");
            
           }
           
        });
                    
            
                  }
                  else{
                  alert("Please fill all fields");
                  }
         
         // alert('yes');
        // ajax
        

    });
  </script>
</html>