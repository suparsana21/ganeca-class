<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Teacher</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
   
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
   <a href="{{route('teacher.create')}}" class="btn btn-primary">Add Teacher</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $key => $teacher)
            <tr>
                <td>{{$teacher->id}}</td>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->address}}</td>
                <td>{{$teacher->phone}}</td>
                <td>
                    <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('teacher.show',$teacher->id)}}" class="btn btn-info">Detail</a>
                    <a href="#" class="btn btn-danger" onclick="
                            if(window.confirm('Apakah ingin menghapus data ?')){
                                $('#formDelete{{$teacher->id}}').submit()
                            }
                        ">Delete</a>
                    <form action="{{route('teacher.destroy',$teacher->id)}}" id="formDelete{{$teacher->id}}" method="POST">
                        {{-- <input type="hidden" name="_method" value="delete"> --}}
                        @method('delete')
                        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                        @csrf
                        {{-- <button type="submit" class="btn btn-danger">Hapus</button> --}}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>