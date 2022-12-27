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
                                    <div class="mb-3 ">
                                       <a href="{{route('addRecruit')}}">
                                            <input type="submit" value="Thêm mới" class="btn-primary btn mt-3 mb-1 ">
                                        </a>
                                        @if (session('msg'))
                                        <div class="alert alert-success text-center">{{session('msg')}}</div>
                                        @endif
                                    </div>


                                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                            <tr class="text-center">
                                                <th>Mã số</th>
                                                <th>Bộ Phận</th>
                                                <th>Tiêu Đề</th>
                                                <th>Ngày Đăng</th>
                                                <th>Ngày Hết Hạn</th>
                                                <th>Ứng Tuyển</th>
                                                <th>Hành động</th>
                                      
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @if (!empty($recruit))
                                            @foreach ($recruit as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>
                                                @switch($item->department)
                                                    @case(1)
                                                        <span>PHP</span>
                                                        @break
                                                
                                                    @case(2)
                                                        <span>Lập Trình. NET</span>
                                                        @break

                                                    @case(3)
                                                        <span>Javascript</span>
                                                    @break

                                                    @case(4)
                                                         <span>Mobile</span>
                                                        @break
                                                
                                                    @case(5)
                                                        <span>Lập Trình IOS</span>
                                                        @break

                                                    @case(6)
                                                        <span>Lập Trình Android</span>
                                                    @break

                                                    @case(7)
                                                        <span>Vận hành, kiểm thử</span>
                                                        @break

                                                    @case(8)
                                                        <span>Kinh Doanh</span>
                                                    @break
                                                
                                                    @default
                                                        <span>Không có dữ liệu</span>
                                                @endswitch
                                                </td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->create_at}}</td>
                                                <td>{{$item->expired_date}}</td>
                                                <td></td>
                                                <td class="text-center">
                                                    <a href="{{route('updateRecruit',  ['id'=>$item->id])}}" class="btn-warning btn-sm ">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này')" href="{{route('deleteRecruit', ['id'=>$item->id])}}" class="btn-danger btn-sm ">Xóa</a>
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
                                        {{$recruit->links()}}
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