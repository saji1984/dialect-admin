@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title"><i class="fas fa-home mr-1"></i> Documents</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('document.index') }}">Documents</a></li>
                        <li class="breadcrumb-item active">Edit Documents</li>
                    </ol>
                </div><!--end col-->
                <div class="col-auto align-self-center">
                    <a href="{{ route('document.index') }}" class="btn btn-sm btn-outline-primary" title="Go Back">
                        Go Back<i class="ml-2 fas fa-arrow-left"></i>
                    </a>
                </div><!--end col-->  
            </div><!--end row-->  
            <div class="row">
            <!-- Form -->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Document</h4>
                        <!-- <p class="text-muted mb-0">Custom stylr example.</p> -->
                    </div><!--end card-header-->
                    <div class="card-body">
                        <form action="{{ route('document.update',$document) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') parsley-error @enderror"
                                               id="name" name="name" value="{{ old('name') ?? $document->name }}" placeholder="Enter name"/>
                                        @error('name')
                                            <small class="text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="numeric_code">Country </label>
                                        <select class="form-control js-example-basic-multiple @error('country_id') parsley-error @enderror" 
                                                id="country_id" name="country_id">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $key => $country)
                                            <option {{ $document->country_id == $country->id ? "selected" : "" }} value="{{ $country->id }}" >
                                                    {{ $country->name }}</option>
                                            @endforeach	

                                        </select>
                                        @error('country_id')
                                            <small class="text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-sm-12 text-right mt-4">
                                    <button type="submit" class="btn btn-primary px-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
            <!-- end form -->
            </div>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->   
@endsection