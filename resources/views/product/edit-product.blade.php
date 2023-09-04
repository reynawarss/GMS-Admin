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
                    <form role="form" action="{{URL::to('/update-product/'.$edit->id)}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Enter the product name" value="{{$edit->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" class="form-control" name="description" placeholder="" rows="12" value="{{$edit->description}}"> -->
                                <textarea class="form-control" name="content">{{ $edit->description }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="price" placeholder="" value="{{$edit->price}}">
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