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
                                       <a href="{{route('addReceiveEmail')}}">
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
                                                <th>Tên </th>
                                                <th>Email</th>
                                                <th width="5%">Trạng Thái</th>
                                                <th width="5%">Trạng Thái</th>
                                                <th width="10%">Hành động</th>
                                      
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @if (!empty($receiveEmail))
                                            @foreach ($receiveEmail as $key => $item)
                                            <tr class="text-center">
                                                <td>{{$key + 1}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td >
                                                @switch($item->status)
                                                    @case(1)
                                                    <button class="btn-primary btn-sm badge ">Mở</button>
                                                        @break
                                                
                                                    @case(0)
                                                    <button class="btn-danger btn-sm badge ">Khóa</button>
                                                        @break

                                                    @default
                                                        <span>Không có dữ liệu</span>
                                                @endswitch
                                                    </td>
                                                <td >
                                                @switch($item->status)

                                                    @case(1)
                                                    <button class="btn-danger btn-sm  ">Khóa</button>
                                                        @break
                                                
                                                    @case(0)
                                                    <button class="btn-primary btn-sm  ">Mở</button>
                                                        @break

                                                    @default
                                                        <span>Không có dữ liệu</span>
                                                @endswitch
                                                 
                                                </td>
                                                <td >
                                                <a href="{{route('updateReceiveEmail',  ['id'=>$item->id])}}" class="btn-warning btn-sm ">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này')" href="{{route('deleteReceiveEmail', ['id'=>$item->id])}}" class="btn-danger btn-sm ">Xóa</a>
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
                                        {{$receiveEmail->links()}}
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