<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        thead {
            background-color: #32F71E;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even){
            background-color: #32F71E
        }
        .button {
            background-color: #150476;
            border: none;
            color: white;
            padding: 5px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        .tambah{
            padding: 8px 16px ;
            text-decoration: none;
        }
    }
    </style>

</head>

<body>
    <div style="overflow-x:auto;">
        <a class="tambah" href="/siswa/create">Tambah Data Siswa</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach($data_siswa as $key => $sw)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $sw->id }}</td>
                    <td>{{ $sw->nama }}</td>
                    <td>{{ $sw->alamat }}</td>
                    <td>
                        <a href="/siswa/{{ $sw->id }}/edit/"><button type = "submitclass" class = "btn btn-info">Edit</button></a>
                        <form action="{{ route('siswa.destroy', $sw->id) }}" method="POST" class="inline-block">
                        {!! method_field('delete') . csrf_field() !!}
                        <button type="submit" class="btn btn-danger">Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>

</html>