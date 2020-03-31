@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <h1>Front Page</h1>
  @endwhile
@endsection
