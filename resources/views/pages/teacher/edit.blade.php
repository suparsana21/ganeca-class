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
        <div class="col-4">
        <form action="{{ route('teacher.store') }}" method="post">
            @csrf 
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Telp</label>
                <input type="text" name="phone"  class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="dob"  class="form-control" >
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