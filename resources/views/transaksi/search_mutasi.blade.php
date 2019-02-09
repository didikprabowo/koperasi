@extends('./template')
    @section('head')
        <title>Mutasi</title> 
    @endsection
    @section('contents')
        <h3>Daftar Mutasi</h3>

        <table class="table table-striped mt-3" id="myTable">
                <tbody>
                    <tr>
                        <th>Cari Anggota</th>
                        <th>
                                <select class="form-control"onchange="mutasi()" id="mutasi">
                                        <option>Pilih Anggota</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{$user->name }}</option>
                                        @endforeach
                                </select>
                        </th>
                </tbody>
        </table>
        <div id="result">

        </div>
    @endsection 
    <script type="text/javascript">
        function mutasi(){
        var mutasi      = $("#mutasi").val();
             $('#result').html('<center>Searching ...</center>'); // Show "Downloading..."
             jQuery.ajax({
                    type: "GET",
                    url: "",
                    data:  {user_id: mutasi},
                    success:function(data){
                     $('#result').html(data);
                    }
            });
        }
    </script>
@show