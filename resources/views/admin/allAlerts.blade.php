@extends('admin.layouts.pages', ["title"=>"See All Alerts"])

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Messages</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            @foreach($contacts as $contact)
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <h2>Full Name: {{$contact->firstName}} {{$contact->lastName}}</h2>
                  <br>
                  <h2>Email: {{$contact->email}}</h2>
                   <br>
                  <h2>Message Content:</h2>
                  <p>{{$contact->message}}</p>
                  <p style="color:blue; font-size:150%">{{$contact->is_read ? 'Read':'Unread'}}</p>
                  <a href="markAsRead/{{ $contact->id }}" onclick="return confirm('Are you sure you want to mark as read?')"><button class="btn btn-primary btn-sm" type="submit">Mark As Read</button></a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- /page content -->

@endsection