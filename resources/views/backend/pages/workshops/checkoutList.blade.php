@extends('backend.layouts.master')

@section('admin-title')
    Checkout List
@endsection

@section('admin-content')
    <div class="container-fluid py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">All Checkouts</h5>
                <span class="badge badge-light text-dark">Total: {{ $checkoutLists->count() }}</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped border">
                        <thead class="thead-light">
                            <tr>
                                <th class="py-3">#ID</th>
                                <th class="py-3">Product Name</th>
                                <th class="py-3">Price</th>
                                <th class="py-3">Quantity</th>
                                <th class="py-3">Customer Name</th>
                                <th class="py-3">Phone</th>
                                <th class="py-3">Address</th>
                                <th class="py-3">Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($checkoutLists as $checkout)
                                <tr>
                                    <td><strong>#{{ $checkout->id }}</strong></td>
                                    <td>{{ $checkout->product_name }}</td>
                                    <td><span class="text-success font-weight-bold">৳ {{ number_format($checkout->price, 2) }}</span></td>
                                    <td class="text-center">
                                        <span class="badge badge-info">{{ $checkout->quantity }}</span>
                                    </td>
                                    <td>{{ $checkout->customer_name }}</td>
                                    <td>{{ $checkout->phone }}</td>
                                    <td>
                                        <small class="text-muted">{{ Str::limit($checkout->address, 50) }}</small>
                                    </td>
                                    <td>
                                        <small>{{ $checkout->created_at->format('d M, Y (h:i A)') }}</small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5 text-muted">
                                        <i class="fas fa-box-open fa-2x mb-2"></i><br>
                                        No checkout data found!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                {{-- Pagination (যদি কন্ট্রোলার থেকে paginate ব্যবহার করেন) --}}
                <div class="mt-3">
                    {{-- $checkouts->links() --}}
                </div>
            </div>
        </div>
    </div>
@endsection