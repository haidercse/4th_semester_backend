@extends('backend.layouts.master')

@section('admin-title')
    All Entries - List
@endsection

@section('admin-content')
    <div class="container" style="padding: 20px;">
        <h2>Workshop Booking List</h2>

        @if (session('success'))
            <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
        @endif

        <table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse;" id="dataTable">
            <thead>
                <tr style="background: #f4f4f4;">
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Guests</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->full_name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->guests }}</td>
                        <td>
                            <a href="{{ route('workshops.edit', $booking->id) }}" style="color: blue;">Edit</a>
                            |
                            <form action="{{ route('workshops.destroy', $booking->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('নিশ্চিত ডিলিট করবেন?')"
                                    style="color: red; border: none; background: none; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
