@extends('layouts.app')

@section('content')
    @if(isset($page))
        @include("pages." . $page)
    @else
        @include("pages.create")
    @endif
@endsection

@section('scripts')
<script>
    $( document ).ready(function() {
        
    });
</script>
@endsection