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
                                       <a href="{{route('addProduct')}}">
                                            <input type="submit" value="Thêm mới" class="btn-primary btn mt-3 mb-1 ">
                                        </a>
                                        @if (session('msg'))
                                        <div class="alert alert-success text-center">{{session('msg')}}</div>
                                        @endif
                                       </div>

                                    <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                                    <thead>
                                                        <tr role = "row">
                                                            <th>Mã số</th>
                                                            <th width="20%" >Ảnh sản phẩm</th>
                                                            <th >Tên sản phẩm</th>
                                                            <!-- <th >Link-ios</th> -->
                                                            <!-- 
                                                            <th >Link-android</th>
                                                            <th>Link_windowphone</th> -->
                                                           
                                                            <th >Thời gian đăng tải</th>
                                                            <th >Hành động</th>
                                                
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    @if (!empty($productList))
                                                        @foreach ($productList as $key => $item)
                                                        <tr class="text-center">
                                                            <td>{{$key + 1}}</td>
                                                            <td>
                                                            <img src="{{$item->image_path}}" class="img-fluid" alt="...">
                                                            </td>
                                                            <td>{{$item->name}}</td>
                                                            <!-- <td>{{$item->link_iOS}}</td>
                                                            <td>{{$item->link_android}}</td>
                                                            <td>{{$item->link_windowphone}}</td> -->
                                                            <!-- <td>{{$item->create_at}}</td> -->
                                                            <td>{{$item->create_at}}</td>
                                                            <td>
                                                               <a href="{{route('updateProduct',  ['id'=>$item->id])}}" class="btn-warning btn-sm mb-md-1">Sửa</a></div>
                                                               <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này')" href="{{route('deleteProduct', ['id'=>$item->id])}}" class="btn-danger btn-sm ">Xóa</a></div>
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
                                            </div>
                                        </div>
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