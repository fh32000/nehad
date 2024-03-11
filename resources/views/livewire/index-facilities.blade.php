@extends('layouts.app')

@section('content')

<div>
 
    <!-- You can control the items of the quantity selector -->
    <x-table :$headers
             :$rows
             filter
             :quantity="[2,5,10]" />
 
    <!-- You can specify different properties for the filter -->
    <x-table :$headers
             :$rows
             filter
             :quantity="[2,5,10]"
             :filters="['quantity' => 'foo', 'search' => 'bar']" />
</div>
@endsection