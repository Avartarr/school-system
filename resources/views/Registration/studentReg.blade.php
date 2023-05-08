<x-file>
    @section("content")
        <div class="row">
            <div class="col-sm-4">
                <h2>Student Registration</h2>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal">Add Faculty</button>
                <div class="modal fade" id="mymodal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Add Faculty</h3>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('faculty_class') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="faculty">Faculty</label>
                                    <input type="text" class="form-control" name="faculty" placeholder="Enter Faculty">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal2">Add Department</button>
                <div class="modal fade" id="mymodal2" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Add Department</h3>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('department_store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control" name="department"
                                        placeholder="Enter Department">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <form action="{{ route('student_Reg') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label col-sm-2">Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>

                <div class="from-group">
                    <label for="lev" class="control-label col-sm-2">Level:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="lev" name="lev">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label col-sm-2">Email:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fac" class="control-label col-sm-2">Faculty:</label>
                    <div class="col-sm-8">
                        {{-- <input type="text" class="form-control" id="fac" name="fac"> --}}

                        <select name="fac" id="" class="form-control">
                            <option value="">~~Select Faculty</option>
                            @foreach ($fac as $fac)
                                <option value="{{ $fac->faculty }}">{{ $fac->faculty }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dept" class="control-label col-sm-2">Department:</label>
                    <div class="col-sm-8">
                        {{-- <input type="text" class="form-control" id="dept" name="dept"> --}}

                        <select name="dept" id="" class="form-control">

                            <option value="">~~ Select Department</option>
                            @foreach ($dep as $dep)
                                <option value="{{ $dep->department }}">{{ $dep->department }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sid"hidden class="control-label col-sm-4">Student ID Number</label>
                    <div class="col-sm-8">
                        <input type="hidden" disabled class="form-control" id="sid" name="sid">
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>

        </div>


        <div class="container">

            <div class="row">
              <div class="col-sm">
                <h4>Student Data  (Total: {{ $getcount }})</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Level</th>
                            <th>Email</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>Reg. No.</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($get as $gt)
                            <tr>
                                <td>{{ $gt->name }}</td>
                                <td>{{ $gt->lev }}</td>
                                <td>{{ $gt->email }}</td>
                                <td>{{ $gt->fac }}</td>
                                <td>{{ $gt->dept }}</td>
                                <td>{{ $gt->sid }}</td>
                                <td>
                                    <span class="icon_ul" data-toggle="modal" data-target="#mymodal3{{ $gt->id }}"></span>
                                    <div class="modal fade" id="mymodal3{{ $gt->id }}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>Update Student Data</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form action="{{ route('update', $gt->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="form-group">
                                                                <label for="name" class="control-label col-sm-2">Name:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $gt->name }}">
                                                                </div>
                                                            </div>

                                                            <div class="from-group">
                                                                <label for="lev" class="control-label col-sm-2">Level:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" class="form-control" id="lev" name="lev" value="{{ $gt->lev }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="email" class="control-label col-sm-2">Email:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="email" name="email" value="{{ $gt->email }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="fac" class="control-label col-sm-2">Faculty:</label>
                                                                <div class="col-sm-8">
                                                                    {{-- <input type="text" class="form-control" id="fac" name="fac"> --}}

                                                                    <select name="fac" id="" class="form-control">
                                                                        <option value="">~~Select Faculty</option>
                                                                        @foreach ($facDetails as $fac2)
                                                                            <option value="{{ $fac2->faculty }}">{{ $fac2->faculty }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="dept" class="control-label col-sm-2">Department:</label>
                                                                <div class="col-sm-8">
                                                                    {{-- <input type="text" class="form-control" id="dept" name="dept"> --}}

                                                                    <select name="dept" id="" class="form-control">

                                                                        <option value="">~~ Select Department</option>
                                                                        @foreach ($depDetails as $dep2)
                                                                            <option value="{{ $dep2->department }}">{{ $dep2->department }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="sid"hidden class="control-label col-sm-4">Student ID Number</label>
                                                                <div class="col-sm-8">
                                                                    <input type="hidden" disabled class="form-control" id="sid" name="sid">
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="icon_trash_alt" data-toggle="modal" data-target="#mymodal4{{ $gt->id }}" style="color: red; margin-left: 20px"></span>
                                    <div class="modal fade" id="mymodal4{{ $gt->id }}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5>Are you sure you want to delete this data?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancle</button>
                                                    <a href="{{ route ('delete', $gt->id) }}"><button class="btn btn-danger" type="submit">Delete</button></a>
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

        {{-- </div> --}}
{{--
        <div class="container"> --}}

            {{-- <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Email</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>Reg. No.</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($get as $gt)
                            <tr>
                                <td>{{ $gt->id }}</td>
                                <td>{{ $gt->name }}</td>
                                <td>{{ $gt->lev }}</td>
                                <td>{{ $gt->email }}</td>
                                <td>{{ $gt->fac }}</td>
                                <td>{{ $gt->dept }}</td>
                                <td>{{ $gt->sid }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="container" style="margin-top: 30px">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Faculties</th>

                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Faculty of Physical Science</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Faculty of Social Science</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Faculty of Bioscience</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Faculty of Engineering</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Faculty of Health science</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Faculty of Law</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Faculty of Education</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Faculty of Art</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Faculty of Management science</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Faculty of Agriculture</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Faculty of Pharmaceutical science</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> --}}

    </div>
</div>
    @endsection
</x-file>
