@extends('backend.layouts.master')

@section('admin-title')
    Edit - Dynamic Form
@endsection

@section('admin-content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h3 class="mb-0">Edit Entry: {{ $form->name }}</h3>
        </div>
        <div class="card-body">
            @include('backend.layouts.partials.message')
            
            <form method="POST" action="{{ route('forms.update', $form->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="row">
                    <div class="form-group col-md-6">
                        <label for="header_name"><strong>Select Your Page</strong></label>
                        <select class="form-control" id="header_name" name="header_name">
                            <option value="Explore_Dhamrai_Clay_Heritage" {{ $form->header_name == 'Explore_Dhamrai_Clay_Heritage' ? 'selected' : '' }}>Explore Dhamrai Clay Heritage</option>
                            <option value="The_Pottery_Making_Process" {{ $form->header_name == 'The_Pottery_Making_Process' ? 'selected' : '' }}>The Pottery Making Process</option>
                            <option value="slider" {{ $form->header_name == 'slider' ? 'selected' : '' }}>Slider</option>
                            <option value="Our_Master_Artisans" {{ $form->header_name == 'Our_Master_Artisans' ? 'selected' : '' }}>Our Master Artisans</option>
                            <option value="gallery" {{ $form->header_name == 'gallery' ? 'selected' : '' }}>Gallery</option>
                            <option value="footer" {{ $form->header_name == 'footer' ? 'selected' : '' }}>Footer</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name"><strong>Name</strong></label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $form->name }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="text"><strong>Short Text</strong></label>
                        <input type="text" name="text" class="form-control" id="text" value="{{ $form->text }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="year_text"><strong>Year/Date Text</strong></label>
                        <input type="text" name="year_text" class="form-control" id="year_text" value="{{ $form->year_text }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="price"><strong>Price</strong></label>
                        <input type="text" name="price" class="form-control" id="price" value="{{ $form->price }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="image"><strong>Upload New Image (Optional)</strong></label>
                        <input type="file" class="form-control" name="image" id="image">
                        
                        <div class="mt-2">
                            <label><strong>Current Image:</strong></label><br>
                            @if($form->image)
                                <img src="{{ asset($form->image) }}" width="120" class="img-thumbnail" alt="Current Image">
                            @else
                                <span class="text-muted">No image uploaded</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description"><strong>Description</strong></label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="4">{{ $form->description }}</textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="footer_details"><strong>Footer Details</strong></label>
                        <textarea name="footer_details" class="form-control" id="footer_details" cols="30" rows="2">{{ $form->footer_details }}</textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-info px-5">Update Information</button>
                    <a href="{{ route('forms.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection