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
                                    
                                    <div class="card-body">

                                        <h4 class="mt-0 header-title">{{$titleService}}</h4>
                                        <div class="mb-3 ">
                                       <a href="{{route('addService')}}">
                                            <input type="submit" value="Thêm mới" class="btn-primary btn mt-3 mb-1 ">
                                        </a>
                                        @if (session('msg'))
                                        <div class="alert alert-success text-center">{{session('msg')}}</div>
                                        @endif
                                    </div>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th width= "5%">Mã số</th>
                                                <th width= "10%">Icon</th>
                                                <th width= "10%">Tiêu đề</th>
                                                <th>Nội Dung</th>
                                                <th width= "15%">Ngày Đăng Tải</th>
                                                <th width= "10%">Hành động</th>
                                      
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @if (!empty($service))
                                            @foreach ($service as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>
                                                <div class="icon-style">
                                                <span class="mdi {{$item->icon}}"></span>
                                                </div>
                                                </td>
                                                <td>{{$item->title}}</td>
                                                <td><?php echo strip_tags($item->content) ?></td>
                                                <td>{{$item->create_at}}</td> 
                                                <td class="text-center">
                                                    <a href="{{route('updateService', ['id'=>$item->id])}}" class="btn-warning btn-sm ">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này')" href="{{route('deleteService', ['id'=>$item->id])}}" class="btn-danger btn-sm ">Xóa</a>
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
                                        {{$service->links()}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
</div>

<!-- Giới thiệu --->

<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">{{$titleIntroduce}}</h4>
                                    <div class="mb-3 ">
                                       <a href="{{route('addIntroduce')}}">
                                            <input type="submit" value="Thêm mới" class="btn-primary btn mt-3 mb-1 ">
                                        </a>
                                        @if (session('msg'))
                                        <div class="alert alert-success text-center">{{session('msg')}}</div>
                                        @endif
                                    </div>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th width= "5%">Mã số</th>
                                                <th width= "12%">Tiêu đề</th>
                                                <th width= "20%">Ảnh</th>
                                                <th>Nội Dung</th>
                                                <th width= "5%">Ưu Tiên</th>
                                                <th width= "10%">Ngày Đăng Tải</th>
                                                <th width= "10%">Hành động</th>
                                      
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @if (!empty($introduce))
                                            @foreach ($introduce as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$item->title}}</td>
                                                <td><img src="{{$item->image_path}}" class="img-fluid" alt="..."></td>
                                                <td><?php echo strip_tags($item->content) ?></td>
                                                <td>{{$item->prioriti}}</td>
                                                <td>{{$item->create_at}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('updateIntroduce', ['id'=>$item->id])}}" class="btn-warning btn-sm ">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này')" href="{{route('deleteIntroduce', ['id'=>$item->id])}}" class="btn-danger btn-sm ">Xóa</a>
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
                                        {{$introduce->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
</div>

 <!-- Phong cách GGame -->

 <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">{{$titleStyle}}</h4>
                                    <div class="mb-3 ">
                                       <a href="{{route('addStyle')}}">
                                            <input type="submit" value="Thêm mới" class="btn-primary btn mt-3 mb-1 ">
                                        </a>
                                        @if (session('msg'))
                                        <div class="alert alert-success text-center">{{session('msg')}}</div>
                                        @endif
                                    </div>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th width= "5%">Mã số</th>
                                                <th>Icon</th>
                                                <th>Tiêu đề</th>
                                                <th>Nội Dung</th>
                                                <th width= "15%">Ngày Đăng Tải</th>
                                                <th width= "10%">Hành động</th>
                                      
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @if (!empty($style))
                                            @foreach ($style as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>
                                                <div class="icon-style">
                                                <span class="mdi {{$item->icon}}"></span>
                                                </div>
                                                </td>
                                                <td>{{$item->title}}</td>
                                                <td><?php echo strip_tags($item->content) ?></td>
                                                <td>{{$item->create_at}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('updateStyle', ['id'=>$item->id])}}" class="btn-warning btn-sm ">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này')" href="{{route('deleteStyle', ['id'=>$item->id])}}" class="btn-danger btn-sm ">Xóa</a>
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
                                        {{$style->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
</div>

<!-- Cuộc sống -->
<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">{{$titleLife}}</h4>
                                    <div class="mb-3 ">
                                       <a href="{{route('addLife')}}">
                                            <input type="submit" value="Thêm mới" class="btn-primary btn mt-3 mb-1 ">
                                        </a>
                                        @if (session('msg'))
                                        <div class="alert alert-success text-center">{{session('msg')}}</div>
                                        @endif
                                    </div>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th width= "5%">Mã số</th>
                                                <th>Icon</th>
                                                <th>Tiêu đề</th>
                                                <th>Nội Dung</th>
                                                <th width= "15%">Ngày Đăng Tải</th>
                                                <th width= "10%">Hành động</th>
                                      
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @if (!empty($life))
                                            @foreach ($life as $key => $item)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>
                                                <div class="icon-style">
                                                <span class="mdi {{$item->icon}}"></span>
                                                </div>
                                                </td>
                                                <td>{{$item->title}}</td>
                                                <td><?php echo strip_tags($item->content) ?></td>
                                                <td>{{$item->create_at}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('updateLife', ['id'=>$item->id])}}" class="btn-warning btn-sm ">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này')" href="{{route('deleteLife', ['id'=>$item->id])}}" class="btn-danger btn-sm ">Xóa</a>
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
                                        {{$life->links()}}
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