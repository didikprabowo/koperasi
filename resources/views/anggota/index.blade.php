@extends('./template')
    @section('head')
        <title>Anggota</title> 
    @endsection
    @section('contents')
        <h3>Daftar Anggota</h3>
        <a href="{{ url('anggota/create') }}" class="btn btn-primary btn-sm ">Tambah Anggota</a>
        <table class="table table-striped mt-3" id="myTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No.Hp</th>
                    <th>Bergabung</th>
                    <th>Action<th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;   
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $user->name}}
                        <td>{{ $user->email}}
                        <td>{{ $user->alamat}}
                        <td>{{ $user->no_hp}}
                        <td>{{ date('m/d/Y H:i:s', strtotime($user->created_at))}}</td>
                        <td>
                            <form action="{{ route('anggota.destroy', $user->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a type="submit" class="btn btn-info btn-sm" href="{{ route('anggota.edit',$user->id) }}">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
            </table>
            {{ $users->links()}}
    @endsection 
@show