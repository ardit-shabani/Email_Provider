@extends('layouts.app')

@section('content')


   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-8">
               <div class="card">
                   <div class="card-header bg-info text-white text-center font-weight-bold " >Email Provider</div>

                   <div class="card-body">
                       @if (session('success'))
                           <div class="alert alert-success" role="alert">
                               {{ session('success') }}
                           </div>
                       @endif

                           <form  method="POST" action="{{route('email.store')}}">
                               @csrf

                               <div class="form-group">
                                   <label for="formGroupExampleInput">To</label>
                                   <input type="text" class="form-control" id="to" placeholder="Emails" name="to" >


                               </div>

                               <div class="form-group">
                                   <label for="formGroupExampleInput2">Subject</label>
                                   <input type="text" class="form-control  " id="subject "
                                          placeholder="Subject" name="subject" required>

                               </div>
                               <div class="form-group">
                                   <label for="email">Email</label>
                                   <textarea class="form-control" id="message" name="message" rows="6" required></textarea>

                               </div>

                               <div class="form-group">
                                   <label for="schedule">Schedule</label>
                                   <input type="text" name="schedule" id="schedule" class="form-control"  >


                               </div>
                               <div class="form-group text-center " >
                                    <button  type="submit" class="btn btn-success">Submit</button>
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
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">

    <script> flatpickr('#schedule',{
        enableTime:true,
        dateFormat: "Y-m-d H:i"
        })</script>


@endsection
@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
