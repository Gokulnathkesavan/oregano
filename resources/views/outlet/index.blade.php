@extends('layouts.simple.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/js-datatables/style.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">

        {{-- Page Title & Add Button --}}
        @include('outlet.partials.header')

        {{-- Filter Form --}}
        @include('outlet.partials.filter')

        {{-- Outlets Table --}}
        @include('outlet.partials.table')

    </div>

    {{-- Create/Edit Modal --}}
    @include('outlet.partials.modal')

     {{-- Create/Delete Modal --}}
    @include('outlet.partials.delete-modal')


    {{-- Link Modal --}}
    @include('outlet.partials.link-modal')
@endsection

@section('scripts')
    @include('outlet.partials.scripts')
@endsection
