
<div class="card" style="height: auto !important;">
    <div class="table-responsive animated fadeInRight">
        <table class="table m-0 table-striped">
            <tbody>

            <tr>
                <th>No</th>
                <th>Employee Name</th>
                <th>Email</th>
                <th><span class="th-title">Edit</span></th>
                <th><span class="th-title">Delete</span></th>
            </tr>

            @forelse($users as $key=>$user)


                <tr>

                    <td>{{ ++$key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <a href="{{ route("employees.edit",$user->id) }}" >
                            <i style="font-size: 18px;" class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('employees.destroy',$user->id) }}" id="{{ $user->id }}" class="btn-delete" data-toggle="modal" data-target="#myModal">
                            <i style="font-size: 18px;"  class="fa fa-trash-o"></i>
                        </a>
                    </td>

                </tr>

            @empty
                <td colspan="6" class="text-center font-weight-bold h5">There is no User yet.</td>
            @endforelse

            </tbody>
        </table>

    </div>

</div>

<div class="d-flex justify-content-between align-items-center">

    {{ $users->links() }}
    <p class="font-weight-bold h4">Total : <span class="text-primary">{{ $users->total() }}</span></p>

</div>

<x-delete-confirm-modal title="Employee" name="user" delOnly="Employee"></x-delete-confirm-modal>

@section("foot")
    <script>
        $(".btn-delete").click(function(){

            // get id and links

            let id = $(this).attr('id');
            var url = "{{route('employees.destroy',':id')}}";
            url = url.replace(":id",id);
            console.log(id);
            $("form").attr('action',url);

        });




    </script>
@endsection
