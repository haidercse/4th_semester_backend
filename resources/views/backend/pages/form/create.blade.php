@extends('backend.layouts.master')

@section('admin_title')
    Create - Dynamic Form
@endsection

@section('admin-content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add New Entry</h3>
        </div>
        <div class="card-body">
            @include('backend.layouts.partials.message')
            
            <form method="POST" action="{{ route('forms.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="header_name"><strong>Select Your Page</strong></label>
                        <select class="form-control" id="header_name" name="header_name">
                            <option value="Explore_Dhamrai_Clay_Heritage">Explore Dhamrai Clay Heritage</option>
                            <option value="The_Pottery_Making_Process">The Pottery Making Process</option>
                            <option value="slider">Slider</option>
                            <option value="Our_Master_Artisans">Our Master Artisans</option>
                            <option value="gallery">Gallery</option>
                            <option value="footer">footer</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name"><strong>Name</strong></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="text"><strong>Short Text</strong></label>
                        <input type="text" name="text" class="form-control" id="text" placeholder="Enter short text">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="year_text"><strong>Year/Date Text</strong></label>
                        <input type="text" name="year_text" class="form-control" id="year_text" placeholder="e.g. 2024">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="price"><strong>Price</strong></label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Enter price">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="image"><strong>Image</strong></label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>

                    

                    <div class="form-group col-md-12">
                        <label for="description"><strong>Description</strong></label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="4" placeholder="Write description here..."></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="footer_details"><strong>Footer Details</strong></label>
                        <textarea name="footer_details" class="form-control" id="footer_details" cols="30" rows="2" placeholder="Enter footer related details"></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success px-5">Save Information</button>
                    <a href="{{ route('forms.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection