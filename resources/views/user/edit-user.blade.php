@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10">
            <div class="card"> <!-- Card Start -->
                <div class="card-header">
                    <h5 class="card-title">
                        Edit User
                    </h5>
                </div>
                <div class="card-body"> <!-- Card Body Start-->
                    <form role="form" action="{{URL::to('/update-user/'.$edit->id)}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{$edit->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Enter your email Address" value="{{$edit->email}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{$edit->password}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">User Role Type</label>
                            <div class="col-sm-10">
                                <select name="role" id="exampleFormControlSelect1" class="form-control" required>
                                    <option value="Admin" {{'Admin' == $edit->role ? 'selected' : '' }}>Admin</option>
                                    <option value="Member" {{'Member' == $edit->role ? 'selected' : '' }}>Member</option>
                                    <option value="Customer" {{'Customer' == $edit->role ? 'selected' : '' }}>Customer</option>
                                </select>
                            </div>
                        </div> 
                    
                </div> <!-- Card Body -->

               <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
               </div>
               </form>
</div>
            </div> <!-- Card End -->
            </div>

            <div class="col-lg-1">         
            </div>
        </div>
    </section>
</div>  <!-- content-wrapper -->


@endsection