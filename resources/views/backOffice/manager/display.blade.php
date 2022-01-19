@extends("backOffice.layout.panel")

@section("content-wrapper")
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Managers List</h4>
                            <p class="card-description">
                                Add class <code>All managers</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Full name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th>
                                            Role
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($managers as $manager)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{asset("assets/uploads/managers/" . $manager->picture)}}" alt="image"/>
                                        </td>
                                        <td>
                                            {{$manager->full_name}}
                                        </td>
                                        <td>
                                            {{$manager->email}}
                                        </td>
                                        <td>
                                            {{$manager->phone}}
                                        </td>
                                        <td>
                                            {{$manager->address}}
                                        </td>
                                        <td>
                                            <label for="" class="badge {{$manager->role == 1 ? "badge-warning" : "badge-success" }}">{{$manager->role == 1 ? "Editor" : "Moderator" }}</label>
                                        </td>
                                        <td>
                                            <form style="display: inline; margin-right: 10px" method="POST" action="{{ route('admin.managers.delete')}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$manager->id}}">
                                                <button type="submit" class="btn badge badge-danger">delete</button>
                                            </form>
                                            <form style="display: inline;" method="POST" action="{{ route('admin.managers.changeRole')}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$manager->id}}">
                                                <input type="hidden" name="role" value="{{$manager->role == 2 ? 1 : 2}}">
                                                <button type="submit" class="btn badge badge-info">set {{$manager->role == 2 ? "Editor" : "Moderator"}}</button>
                                            </form>
                                            <a href=""></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
