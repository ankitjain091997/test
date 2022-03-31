<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">

</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('registration') }}"> Create Company</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th> 
<th>Name</th>
<th> Email</th>
<th>hobbies</th>
<th>image</th>
<th width="280px">Action</th>
</tr>
@foreach ($register as $res)
<tr>
<td>{{ $res->id }}</td>
<td>{{ $res->name }}</td>
<td>{{ $res->email }}</td>
<td>{{ $res->hobbies }}</td>
<td><img src="/image/{{ $res->file }}" width="100px"> </td>
<td>

<a class="btn btn-primary" href="{{ route('edit',$res->id) }}">Edit</a>
<a class="btn btn-danger" href="{{ route('destroy',$res->id) }}">Delete</a>

</td>
</tr>
@endforeach
</table>

</body>
</html>