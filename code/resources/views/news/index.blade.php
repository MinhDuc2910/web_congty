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
                                       <a href="{{route('addNews')}}">
                                            <input type="submit" value="Thêm mới" class="btn-primary btn mt-3 mb-1 ">
                                        </a>
                                        @if (session('msg'))
                                        <div class="alert alert-success text-center">{{session('msg')}}</div>
                                        @endif
                                    </div>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">Mã số</th>
                                                <th width="20%">Ảnh minh Họa</th>
                                                <th>Tiêu đề</th>
                                                <th width="15%">Ngày Đăng</th>
                                                <th width= "10%">Hành động</th>
                                      
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (!empty($newsList))
                                            @foreach ($newsList as $key => $item)
                                            <tr class="text-center">
                                                <td>{{$key+ 1}}</td>
                                                <td>
                                                <img src="{{$item->image_path}}" class="img-fluid" alt="...">
                                                </td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->create_at}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('updateNews',  ['id'=>$item->id])}}" class="btn-warning btn-sm ">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này')" href="{{route('deleteNews', ['id'=>$item->id])}}" class="btn-danger btn-sm ">Xóa</a>
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
                                        {{$newsList->links()}}
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