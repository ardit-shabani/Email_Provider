@extends('layouts.app')

@section('content')


   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-8">
               <div class="card">
                   <div class="card-header">Dashboard</div>

                   <div class="card-body">
                       @if (session('status'))
                           <div class="alert alert-success" role="alert">
                               {{ session('status') }}
                           </div>
                       @endif

                           <form action="submit" method="POST">


                               <div class="form-group">
                                    @csrf
                                   <label for="formGroupExampleInput">To</label>
                                   <input type="text" class="form-control" id="to" placeholder="Emails" name="to">
                               </div>



                               <div class="form-group">
                                   <label for="formGroupExampleInput2">Subject</label>
                                   <input type="text" class="form-control" id="formGroupExampleInput2"
                                          placeholder="Subject" name="subject">
                               </div>
                               <div class="form-group">
                                   <label for="exampleFormControlTextarea1">Email</label>
                                   <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                               </div>

                               <div class="form-group">
                                   <label for="published_at">Schedule</label>
                                   <input type="text" name="published_at" id="published_at" class="form-control">

                               </div>
                               <div class="form-group">
                                    <button class="btn btn-success">Submit</button>
                               </div>
                           </form>
                   </div>
               </div>
           </div>
       </div>
   </div>


@endsection

@section('scripts')

    <scrip src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></scrip>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script> flatpickr('#published_at',{
        enableTime:true
        })</script>


@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
