@extends('./template')
    @section('head')
        <title> Tarik Tunai</title> 
    @endsection
    @section('contents')
            <h2>Tarik Tunai</h2>
            <form action="{{ route('transaksi.penarikan') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                <label>Anggota:</label>
                <select class="form-control" name="user_id">
                        <option>Pilih Anggota</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{$user->name }}</option>
                        @endforeach
                </select>
                </div>
                <div class="form-group">
                        <label>Nominal:</label>
                        <input type="number" class="form-control"  name="nominal" min="1" placeholder="Nominal" id="nominal" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button><span id="message" class="text-danger"></span>
            </form>
    @endsection
   
@show