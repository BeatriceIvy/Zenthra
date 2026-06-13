@extends('layouts.app')

@section('title', 'Contact Us - Zenthra')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')
<div class="contact-container">
    
    <!-- HEADER TITLE -->
    <div class="contact-title-section">
        <h1>GET IN TOUCH</h1>
        <p>Have any questions about custom PC building or hardware availability? Reach out to us!</p>
    </div>

    <!-- MAIN GRID LAYOUT -->
    <div class="contact-grid">
        
        <!-- KOLOM KIRI: FORM KIRIM PESAN -->
        <div class="contact-form-card">
            <h2>Send Us a Message</h2>
            
            <!-- Form Handler (Bisa diarahkan ke sistem penampung pesan jika mau dikembangkan) -->
            <form action="#" method="POST">
                @csrf
                <div class="form-group-contact">
                    <label>Your Name</label>
                    <input type="text" name="name" placeholder="John Doe" required>
                </div>

                <div class="form-group-contact">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="john.doe@email.com" required>
                </div>

                <div class="form-group-contact">
                    <label>Subject</label>
                    <input type="text" name="subject" placeholder="Custom PC Build Consultation / Warranty Claim" required>
                </div>

                <div class="form-group-contact">
                    <label>Message</label>
                    <textarea name="message" rows="5" placeholder="Write your message detail here..." required style="resize: none;"></textarea>
                </div>

                <button type="submit" class="btn-contact-send">SEND MESSAGE</button>
            </form>
        </div>

        <!-- KOLOM KANAN: DETAIL INFO KONTAK & LOKASI -->
        <div class="contact-info-section">
            
            <!-- Card Detail Kontak -->
            <div class="info-card-kustom">
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="info-text">
                        <h4>Our HQ Location</h4>
                        <p>Jl. Tekno Utama No. 404, Cyber City, Indonesia</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="info-text">
                        <h4>Email Support</h4>
                        <p>support@zenthra.test</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="info-text">
                        <h4>Hotline / WhatsApp</h4>
                        <p>+62 812-9876-5432</p>
                    </div>
                </div>
            </div>

            <!-- Card Peta Lokasi (Tiruan Estetik) -->
            <div class="info-card-kustom" style="display: flex; flex-direction: column; gap: 15px;">
                <h4 style="color: #fff; font-size: 14px; font-weight: bold; margin: 0;">Store Location Map</h4>
                <div class="map-placeholder">
                    <i class="fa-solid fa-earth-asia" style="color: #22d3ee; font-size: 18px;"></i>
                    Zenthra Store Interactive Map
                </div>
            </div>

        </div>

    </div>
</div>
@endsection