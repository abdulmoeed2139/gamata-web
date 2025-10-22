@extends('websitePages.master')
@section('content')

<div class="dashboard-wrapper">
    <div class="dashboard-box">
        <h2 class="dashboard-title">👋 Welcome, {{ auth()->user()->name }}</h2>
        <p class="dashboard-subtitle">You are now logged in to your account.</p>

        <div class="dashboard-actions">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dashboard-btn logout-btn">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection