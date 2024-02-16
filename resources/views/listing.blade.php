@extends('layouts.pages', ["title"=>"Car Listings","value"=>"Listings"])

@section('content')  
      
@include('includes.carListings')
  
@include('includes.testimonials')

@endsection