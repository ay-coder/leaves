@extends('layouts.master')

@section('title')
    Wve Labs
@endsection

@section('content')
<div class="tab-content">
    
    <!-- Dashboard view -->
    <div id="dash" class="tab-pane fade @if(!isset($_GET['page'])) {{ 'in active' }} @endif">
        @include('partials.dash')
    </div>
    
    <!-- View for admin -->
    <div id="edit" class="tab-pane fade @if(isset($_GET['page'])) {{'in active'}} @endif">
        @include('partials.edit')
    </div>

    <div id="add" class="tab-pane fade">
        @include('partials.add')
    </div>

    <!-- View for regular employee -->
    <div id="request" class="tab-pane fade">
        @include('partials.request')
    </div>

    <div id="leaves" class="tab-pane fade">
        @include('partials.leaves')
    </div>

</div>
@endsection