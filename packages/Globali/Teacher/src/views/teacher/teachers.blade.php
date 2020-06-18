@extends('layouts.my_frame')
@section('title','Teacher List')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="news_list" class="table table-bordered">
                        <thead>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Nationality</th>
                        <th>State</th>
                        <th>Post Code</th>
                        <th>Experience</th>
                        <th>Specialized Subject</th>
                        <th>Assigned Subject</th>
                        </thead>
                        <tbody>

                        @if($teacher)
                            @foreach($teacher as $key=>$item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <img src="{{url('storage/'.$item->image)}}" alt="{{$item->name}}" height="100">
                                    </td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->nationality}}</td>
                                    <td>{{$item->state}}</td>
                                    <td>{{$item->post_code}}</td>
                                    <td>{{$item->experience}}</td>
                                    <td>{{$item->specialized_subject}}</td>
                                    <td>{{$item->assigned_subject}}</td>

                                    <td><a href="{{url('admin/teachers/'.$item->id.'/edit')}}" style="border-radius:50%" class="btn btn-success"><i class="fa fa-edit"></i></a></td>

                                    <td>
                                        <form method="post" action="{{url('admin/teachers/'.$item->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border-radius:50%" onclick="return confirm('Do you want to delete this?')" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $(".teachers").addClass('active');
            $(".teachers_list").addClass('active');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#news_list').DataTable( {
                "scrollX": true
            } );
        } );
        $('.teachers').addClass('active');
        $('.teachers_list').addClass('active');
    </script>
@endsection
