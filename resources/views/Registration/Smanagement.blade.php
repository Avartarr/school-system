<x-file>
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h4>Faculties</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($facs as $facs)
                                <tr>

                                    <td>{{ $facs->faculty }}</td>

                                    <td>
                                        <span class="icon_ul" data-toggle="modal" data-target="#mymodal{{ $facs->id }}"></span>
                                        <div class="modal fade" id="mymodal{{ $facs->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Update Faculty</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="container">
                                                       <form action="{{ route('update4', $facs->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                                       @csrf
                                                       @method('PATCH')
                                                       <div class="form-group">
                                                            <label for="">Faculty Name:</label>
                                                            <input type="text" class="form-control" name="faculty" value="{{ $facs->faculty }}">
                                                       </div>
                                                       <div class="text-center">
                                                        <button class="btn btn-default" type="button" data-dismiss="modal" >Cancle</button>
                                                        <button class="btn btn-primary" type="submit">Save</button>
                                                    </div>
                                                       </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="icon_trash_alt" style="color: red; margin-left: 20px" data-toggle="modal" data-target="#mymodal2{{ $facs->id }}"></span>
                                        <div class="modal fade" id="mymodal2{{ $facs->id }}" role="dialog">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Are you sure you want to delete?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                                        <a href="{{ route('delete2', $facs->id) }}"><button type="submit" class="btn btn-danger">Delete</button></a>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm">
                    <h4>Departments</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dept as $dept)
                                <tr>
                                    <td>{{ $dept->department }}</td>
                                    <td>
                                        <span class="icon_ul" data-toggle="modal" data-target="#mymodal3{{ $dept->id }}"></span>
                                        <div class="modal fade" id="mymodal3{{ $dept->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div  class="modal-header">
                                                        <h5>Update Department</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('update5', $dept->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="form-group">
                                                                <label for="">Department Name</label>
                                                                <input type="text" class="form-control" name="department" value="{{ $dept->department }}">
                                                                <div class="text-center">
                                                                    <button class="btn btn-default" type="button" data-dismiss="modal" >Cancle</button>
                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <span class="icon_trash_alt" style="color: red; margin-left: 20px" data-toggle="modal" data-target="#mymodal4{{ $dept->id }}"></span>
                                        <div class="modal fade" id="mymodal4{{ $dept->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Are you sure you want to delete?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-default" data-dismiss="modal" type="button">Cancle</button>
                                                       <a href="{{ route('delete3', $dept->id) }}"> <button class="btn btn-danger" type="submit">Delete</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    @endsection
</x-file>
