<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container m-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif

        <div class="col-4">
        <form action="{{ route('teacher.update',[$data->id]) }}" method="POST">
        {{-- <form action="http://localhost:5000/teacher/{{$data->id}}" method="post"> --}}
        {{-- <form action="{{url('teacher/'.$data->id)}}" method="post"> --}}
            <input type="hidden" name="_method" value="PUT">
            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
            {{-- @method('PUT') --}}
            @csrf 
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" class="form-control" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" value="{{$data->address}}">
            </div>
            <div class="form-group">
                <label for="">Telp</label>
                <input type="text" name="phone"  class="form-control" value="{{$data->phone}}">
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="dob"  class="form-control" value="{{$data->dob}}">
            </div>
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>