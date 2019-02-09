@extends('./template')
    @section('head')
        <title>Tambah Anggota</title> 
    @endsection
    @section('contents')
            <h2>Tambah Anggota</h2>
            <form action="{{ url('anggota') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Name:</label>
                  <input type="name" class="form-control" placeholder="Enter Name" name="name" required>
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                </div>
                <div class="form-group">
                        <label>Address:</label>
                        <textarea class="form-control" cols="5" placeholder="Enter Your Address" name="alamat" required></textarea>
                </div>
                <div class="form-group">
                        <label>No.Hp:</label>
                        <input type="number" class="form-control" placeholder="Enter Number"  min="1" minlength="11" name="no_hp" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
    @endsection

@show