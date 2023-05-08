<x-file>
    @section('content')
        <div class="row">
            <div class="col-sm-3">
                <h3>General Result</h3>
            </div>
            <div class="col-sm-5">
                <a href="{{ route('result') }}"><button class="btn btn-primary">A-List</button></a>
                <a href="{{ route('resultb') }}"><button class="btn btn-primary">B-List</button></a>
            </div>
            <div class="col-sm-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal">Add Result</button>
                <div class="modal fade" id="mymodal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Add Student Result</h3>
                            </div>

                            <div class="modal-body">
                                <div class="container">
                                    <form class="form-horizontal" action="{{ route('dash_Board') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Name:</label>
                                            <div class="col-sm-10">
                                                {{-- <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Student Name"> --}}

                                                <select name="name" id="" class="form-control">

                                                    <option value="">Name</option>
                                                    @foreach ($name as $name)
                                                        <option value="{{ $name->name }}">{{ $name->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="mat">Maths:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="mat" id="mat">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="eng">English:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="eng" id="eng">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="che">Chemistry: </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="che" id="che">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="phy">Physics: </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="phy" id="phy">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="bio">Biology: </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="bio" id="bio">
                                            </div>
                                        </div>



                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Cancle</button>
                                            <button class="btn btn-primary" type="submit">Save</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Mathematics</th>
                        <th>English Lang.</th>
                        <th>Chemistry</th>
                        <th>Physics</th>
                        <th>Biology</th>
                        <th>Average</th>
                        <th>Grade</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($get as $gt)
                        <tr>
                            <td>{{ $gt->id }}</td>
                            <td>{{ $gt->name }}</td>
                            <td>{{ $gt->mat }}</td>
                            <td>{{ $gt->eng }}</td>
                            <td>{{ $gt->che }}</td>
                            <td>{{ $gt->phy }}</td>
                            <td>{{ $gt->bio }}</td>
                            <td>{{ ($gt->mat + $gt->eng + $gt->che + $gt->phy + $gt->bio) / 5 }}</td>
                            <td>
                                @if (($gt->mat + $gt->eng + $gt->che + $gt->phy + $gt->bio) / 5 > 80)
                                    <h6 style="color: green">A1</h6>
                                @elseif (($gt->mat + $gt->eng + $gt->che + $gt->phy + $gt->bio) / 5 > 70)
                                    <h6 style="color: blue">B</h6>
                                @elseif (($gt->mat + $gt->eng + $gt->che + $gt->phy + $gt->bio) / 5 > 60)
                                    <h6 style="color: yellow">C</h6>
                                @elseif (($gt->mat + $gt->eng + $gt->che + $gt->phy + $gt->bio) / 5 > 50)
                                    <h6 style="color: orange">D</h6>
                                @elseif (($gt->mat + $gt->eng + $gt->che + $gt->phy + $gt->bio) / 5 > 40)
                                    <h6 style="color: brown">E</h6>
                                @else
                                    <h6 style="color: red">F</h6>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary" type="submit" data-toggle="modal"
                                    data-target="#mymodal2{{ $gt->id }}">Update</button>
                                <div class="modal fade" id="mymodal2{{ $gt->id }}" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Update Student Details</h3>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="container">
                                                    <form class="form-horizontal" action="{{ route('chisom', $gt->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2"
                                                                for="name">Name:</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" value="{{ $gt->name }}"
                                                                    placeholder="Student Name">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2"
                                                                for="mat">Maths:</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="mat"
                                                                    id="mat" value="{{ $gt->mat }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2"
                                                                for="eng">English:</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control" name="eng"
                                                                    id="eng" value="{{ $gt->eng }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2"
                                                                for="che">Chemistry: </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="che"
                                                                    id="che" value="{{ $gt->che }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2" for="phy">Physics:
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="phy"
                                                                    id="phy" value="{{ $gt->phy }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2" for="bio">Biology:
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="bio"
                                                                    id="bio" value="{{ $gt->bio }}">
                                                            </div>
                                                        </div>



                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancle</button>
                                                            <button class="btn btn-primary" type="submit">Update</button>

                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <button class="btn btn-warning" type="submit" data-toggle="modal"
                                    data-target="#mymodal3">Delete</button>
                                <div class="modal fade" id="mymodal3" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this record?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default" type="button"
                                                    data-dismiss="modal">cancle</button>
                                                <a href="{{ route('deleted', $gt->id) }}"><button class="btn btn-danger"
                                                        type="submit">Delete</button></a>
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
    @endsection
</x-file>
