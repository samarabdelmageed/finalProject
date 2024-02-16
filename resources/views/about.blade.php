@extends('layouts.pages', ["title"=>"About","value"=>"About"])

@section('content')  
      
@include('includes.carCompany')
  
@include('includes.team')

@include('includes.history')

@endsection