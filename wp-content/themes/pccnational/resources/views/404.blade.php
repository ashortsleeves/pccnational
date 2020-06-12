@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="container container-sm container-404">
      <div class="alert alert-warning">
        {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
        <a href="javascript:history.back()">Go Back</a>
      </div>
    </div>
  @endif
@endsection
