@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">News Data</h3>
                <div class="card-tools">
                <a href="{{URL::to('/add-pengumuman-index')}}" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Title</th>
                    <th>Content</th>                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>                  
                  @foreach($all as $key=>$row)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{$row->content}}</td>                   
                    <td align="center">
                        <a href="{{URL::to('/edit-pengumuman/'.$row->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>                        
                        <a href="{{URL::to('/delete-pengumuman/'.$row->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
<!-- /.content-wrapper -->

@endsection