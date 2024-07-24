@extends('layouts.admin')


@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách danh mục</b></a></li>
    </ul>
    <div id="clock"></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
      
                      <a class="btn btn-add btn-sm" href="{{route('danhmuc.create')}}" title="Thêm"><i class="fas fa-plus"></i>
                        Tạo mới danh mục</a>
                    </div>
                     {{--
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                          class="fas fa-file-upload"></i> Tải từ file</a>
                    </div>
      
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                          class="fas fa-print"></i> In dữ liệu</a>
                    </div>
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                          class="fas fa-copy"></i> Sao chép</a>
                    </div>
      
                    <div class="col-sm-2">
                      <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                    </div>
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                          class="fas fa-file-pdf"></i> Xuất PDF</a>
                    </div> --}}
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                          class="fas fa-trash-alt"></i> Xóa tất cả </a>
                    </div>
                  </div>
                  {{-- Thêm thành công --}}
                  @if (session('add_success'))
                  <div class="alert alert-success">
                      {{session('add_success')}}
                  </div>
                  @endif

              {{-- Sửa thành công --}}
              @if (session('edit_success'))
              <div class="alert alert-success">
                  {{session('edit_success')}}
              </div>
              @endif

               {{-- Sửa thành công --}}
               @if (session('delete_success'))
               <div class="alert alert-success">
                   {{session('delete_success')}}
               </div>
               @endif
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($danh_mucs as $index => $item)
                                
                        <tr>
                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                            <td>{{ $index + 1}}</td>
                            <td> {{ $item->name }}</td>
                            <td>
                                <form action="{{route('danhmuc.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                {{-- <button class="btn btn-primary btn-sm trash" type="submit" onclick="return confirm('Bạn có chắc muốn xóa không?')"><i class="fas fa-trash-alt"></i> </button> --}}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không?')"><i class="fas fa-trash-alt"></i></button>
                            </form>

                                <a href="{{route('danhmuc.edit', $item->id)}}"><button class="btn btn-warning btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection