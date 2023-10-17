<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <h1 class="text-center mb-4 mt-4">Data Siswa</h1>
    <div class="container">
        <a href="{{ route('tambah') }}" class="btn btn-success mb-3">Tambah +</a>

        {{-- <form>
          <div class="mb-3">
            <input type="search" class="form-control" id="exampleInputEmail1">
          </div>
        </form> --}}
        <div class="row">
          {{-- @if ($message = Session::get('success'))
          <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->nama }}</td>
                        <td>
                          <img src="{{ asset('fotosiswa/'.$row->foto) }}" alt="" style="width: 70px;">
                        </td>
                        <td>{{ $row->jeniskelamin }}</td>
                        <td>0{{ $row->notelepon }}</td>
                        <td>{{ $row->created_at->format('D M Y')}}</td>
                        <td>
                          <a href="/tampildata/{{ $row->id }}" class="btn btn-info">Edit</a>
                          <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $loop->iteration }}">Delete</a>
                        </td>
                      </tr> 
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
    $('.delete').click( function() {
      let siswaid = $(this).attr('data-id');
      let angka = $(this).attr('data-nama');
      swal({
        title: "Yakin ?",
        text: "Kamu akan menghapus data siswa di baris "+angka+"",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location =  "/delete/"+siswaid+""
          swal("Data berhasil dihapus", {
            icon: "success",
          });
        } else {
          swal("Data tidak jadi dihapus!");
        }
      });
    });
  </script>

  <script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
  </script>
</html>