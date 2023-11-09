@extends('layouts.app')

@section('title', 'Buku')

@section('content')
  @include('components.home.hero')
  @include('components.home.section-search')
  @include('components.home.section-buku')
@endsection