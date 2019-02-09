@extends('./template')
    @section('head')
        <title>Edit Anggota</title> 
    @endsection
    @section('contents')
            <h2>Edit Anggota</h2>
            <form action="{{ route('anggota.update', $user->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                  <label>Name:</label>
                  <input type="name" class="form-control" placeholder="Enter Name" name="name"  value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control" placeholder="Enter Email" name="email"  value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                        <label>Address:</label>
                        <textarea class="form-control" cols="5" placeholder="Enter Your Address" name="alamat" required>{{ $user->alamat }}</textarea>
                </div>
                <div class="form-group">
                        <label>No.Hp:</label>
                        <input type="number" class="form-control" placeholder="Enter Number"  min="1" minlength="11" name="no_hp"  value="{{ $user->no_hp }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
    @endsection

@show