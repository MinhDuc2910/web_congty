@extends('layout.main')
@section('css')
<link href="{{asset('assets/plugins/datatables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">{{$title}}</h4>
                                    @if (session('msg'))
                                        <div class="alert alert-success text-center">{{session('msg')}}</div>
                                    @endif
                                    <br/>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                            <tr class="text-center">
                                                <th>Mã số</th>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th width="10%">Ngày sinh</th>
                                                <th>Giới tính</th>
                                                <th>File CV</th>
                                                <th>Ngày Gửi</th>
                                                <th width="5%">Hành động</th>
                                      
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @if (!empty($feedback))
                                            @foreach ($feedback as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>{{$item->birthday}}</td>
                                                <td>{{$item->gender}}</td>
                                                <td>{{$item->cv}}</td>
                                                <td>{{$item->create_at}}</td>
                                                <td class="text-center">
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này')" href="{{route('deleteMailBox', ['id'=>$item->id])}}" class="btn-danger btn-sm ">Xóa</a>
                                                </td>
                                                
                                            </tr>
                                           @endforeach
                                           @else
                                           <tr>
                                            <td solspan="4">Không có dữ liệu</td>
                                           </tr>
                                          @endif
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end mt-3">
                                        {{$feedback->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
@endsection
@section('js')
<script src="{{asset('assets/plugins/datatables.min.js')}}"></script>
@endsection