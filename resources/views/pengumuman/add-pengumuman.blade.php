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
                        Add NEWS
                    </h5>
                </div>
                <div class="card-body"> <!-- Card Body Start-->
                    <form role="form" action="{{URL::to('/insert-pengumuman')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="Enter Your Announcement Title" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" class="form-control" name="description" placeholder="" rows="12" required> -->
                                <textarea class="form-control" name="content" placeholder="Enter Your Announcement Content" rows="3"></textarea>
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