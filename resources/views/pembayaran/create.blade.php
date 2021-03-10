@extends('layouts.master')
@section('title', 'pembayaran')
@section('pagetitle')
    <h1>input pembayaran</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                 <form action="{{ route('pembayaran.store') }}" method="POST">
                   @csrf
                   @include('pembayaran.partial.form',['submit' => 'Tambah'])
                 </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
    
@endpush
