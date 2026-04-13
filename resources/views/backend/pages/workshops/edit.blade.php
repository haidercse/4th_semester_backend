@extends('backend.layouts.master')

@section('admin-title')
    Edit Workshop Booking
@endsection

@section('admin-content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Workshop Booking</h5>
                        <a href="{{ route('workshops.index') }}" class="btn btn-light btn-sm">Back to List</a>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('workshops.update', $workshop->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-bold">Full Name</label>
                                    <input type="text" name="full_name" class="form-control" value="{{ $workshop->full_name }}" placeholder="Enter full name" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-bold">Email Address</label>
                                    <input type="email" name="email" class="form-control" value="{{ $workshop->email }}" placeholder="Enter email" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-bold">Booking Date</label>
                                    <input type="date" name="booking_date" class="form-control" value="{{ $workshop->booking_date }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-bold">Number of Guests</label>
                                    <select name="guests" class="form-control custom-select">
                                        <option value="1" {{ $workshop->guests == 1 ? 'selected' : '' }}>1 Person</option>
                                        <option value="2" {{ $workshop->guests == 2 ? 'selected' : '' }}>2 Persons</option>
                                        <option value="3" {{ $workshop->guests == 3 ? 'selected' : '' }}>3 Persons</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label font-weight-bold">Additional Information</label>
                                <textarea name="additional_info" class="form-control" rows="4" placeholder="Any special requests...">{{ $workshop->additional_info }}</textarea>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="fas fa-save mr-1"></i> Update Booking
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection