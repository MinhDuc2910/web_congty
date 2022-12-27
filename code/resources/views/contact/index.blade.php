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

                                       <div class="row justify-content-around">
                                        <form action="" class="col-md-8 bg-light p-3 my-3" method="POST" >
                                          @csrf
                                          <h1 class="text-center text-uppercase h3 my-3">{{$title}}</h1>
                                          @if (session('msg'))
                                            <div class="alert alert-success text-center">{{session('msg')}}</div>
                                            @endif
                                          @error('msg')
                                            <div class="alert  alert-danger text-center">{{$message}}</div>
                                            @enderror


                                          <div class="form-group ">
                                            <label for="name">Tên công ty *</label>
                                            <input type="text" name ="name" id="name" class="form-control" placeholder="Tên công ty Tiếng Việt" required value="{{old('name') ?? $contactList->company}}">
                                            @error('name')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                          </div>

                                          <div class="form-group ">
                                            <input type="text" name ="name_en" id="name_en" class="form-control" placeholder="Tên công ty Tiếng Anh" required value="{{old('name_en') ?? $contactList->company_en}}">
                                            @error('name_en')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                          </div>

                                          <div class="form-group">
                                            <label for="phone">Số điện thoại *</label>
                                            <input type="text" name ="phone" id="phone" class="form-control" required value="{{old('phone') ?? $contactList->phone}}">
                                            @error('phone')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                          </div>


                                          <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" name ="email" id="email" class="form-control" required value="{{old('email') ?? $contactList->email}}"/>
                                            @error('email')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                          </div>

                                          <div class="form-group">
                                            <label for="email_recruit">Email tuyển dụng *</label>
                                            <input type="email_recruit" name ="email_recruit" id="email_recruit" class="form-control" required value="{{old('email_recruit') ?? $contactList->email_recruit}}"/>
                                            @error('email_recruit')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                          </div>

                                          <div class="form-group ">
                                            <label for="address">Địa chỉ *</label>
                                            <input type="text" name ="address" id="address" class="form-control" placeholder="Địa chỉ Tiếng Việt" required value="{{old('address') ?? $contactList->address}}">
                                            @error('address')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                          </div>

                                          <div class="form-group ">
                                            <input type="text" name ="address_en" id="address_en" class="form-control" placeholder="Địa chỉ Tiếng Anh" required value="{{old('address_en') ?? $contactList->address_en}}">
                                            @error('address_en')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                          </div>

                                          <div class="form-group ">
                                            <label for="office">Văn phòng *</label>
                                            <input type="text" name ="office" id="office" class="form-control" placeholder="Văn phòng Tiếng Việt" required value="{{old('office') ?? $contactList->office}}">
                                            @error('office')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                          </div>

                                          <div class="form-group ">
                                            <input type="text" name ="office_en" id="office_en" class="form-control" placeholder="Văn phòng Tiếng Anh" required value="{{old('office_en') ?? $contactList->office_en}}">
                                            @error('office_en')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                          </div>

                                          <button type="submit" name="submit" class="btn-primary btn mb-3">Cập nhật</button>
                                        </form>
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