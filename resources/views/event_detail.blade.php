<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $event->title }} — XPass</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ===== CSS Variables ===== */
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #a5b4fc;
            --accent: #8b5cf6;
            --text: #1e293b;
            --text-muted: #64748b;
            --text-light: #94a3b8;
            --bg: #f8fafc;
            --bg-alt: #f1f5f9;
            --white: #ffffff;
            --border: #e2e8f0;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.04);
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.07), 0 2px 4px -2px rgba(0,0,0,0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.08), 0 8px 10px -6px rgba(0,0,0,0.04);
            --radius: 12px;
            --radius-lg: 16px;
            --transition: 0.2s ease;
            --green: #059669;
            --green-bg: #ecfdf5;
        }

        /* ===== Reset & Base ===== */
        *, *::before, *::after { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 15px;
            line-height: 1.6;
            color: var(--text);
            background: var(--bg);
            -webkit-font-smoothing: antialiased;
        }
        a { text-decoration: none; color: inherit; }

        /* ===== Layout ===== */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ===== Header ===== */
        .header {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(8px);
            background: rgba(255,255,255,0.95);
        }
        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.375rem;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: -0.02em;
        }
        .brand-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
        }
        .nav { display: flex; align-items: center; gap: 8px; }
        .nav-link {
            padding: 8px 16px;
            font-size: 0.9375rem;
            font-weight: 500;
            color: var(--text-muted);
            border-radius: 8px;
            transition: var(--transition);
        }
        .nav-link:hover { color: var(--text); background: var(--bg-alt); }
        .nav-link.active { color: var(--primary); background: rgba(99,102,241,0.08); }
        .nav-cta {
            margin-left: 8px;
            padding: 10px 20px;
            font-size: 0.875rem;
            font-weight: 600;
            color: #fff;
            background: var(--primary);
            border-radius: 8px;
            transition: var(--transition);
        }
        .nav-cta:hover { background: var(--primary-dark); transform: translateY(-1px); }

        /* ===== Breadcrumb ===== */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
            color: var(--text-muted);
            margin: 24px 0 16px;
        }
        .breadcrumb a { color: var(--primary); }
        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb svg { width: 14px; height: 14px; }

        /* ===== Main Content ===== */
        .main { padding-bottom: 64px; }
        .detail-grid {
            display: grid;
            gap: 32px;
            grid-template-columns: 1fr;
        }
        @media (min-width: 900px) {
            .detail-grid { grid-template-columns: 2fr 1fr; }
        }

        /* ===== Event Card ===== */
        .event-main {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            overflow: hidden;
        }
        .event-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            padding: 32px;
            color: #fff;
        }
        .event-badge {
            display: inline-block;
            padding: 4px 12px;
            background: rgba(255,255,255,0.2);
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 12px;
            backdrop-filter: blur(4px);
        }
        .event-title {
            margin: 0;
            font-size: 1.75rem;
            font-weight: 700;
            line-height: 1.3;
        }
        .event-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        .event-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9375rem;
            color: rgba(255,255,255,0.9);
        }
        .event-meta-item svg { width: 18px; height: 18px; opacity: 0.8; }
        .event-body { padding: 32px; }
        .section-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            margin-bottom: 8px;
        }
        .event-description {
            font-size: 1rem;
            color: var(--text);
            line-height: 1.8;
            margin: 0;
        }

        /* ===== Sidebar ===== */
        .sidebar { display: flex; flex-direction: column; gap: 24px; }
        .sidebar-card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            padding: 24px;
        }
        .sidebar-card-title {
            margin: 0 0 16px;
            font-size: 1rem;
            font-weight: 600;
            color: var(--text);
        }
        .price-display {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 4px;
        }
        .price-free {
            display: inline-block;
            padding: 6px 14px;
            background: var(--green-bg);
            color: var(--green);
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
        }
        .price-note {
            font-size: 0.8125rem;
            color: var(--text-muted);
            margin-bottom: 20px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 14px 24px;
            font-size: 0.9375rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }
        .btn-primary {
            background: var(--primary);
            color: #fff;
        }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }
        .btn-secondary {
            background: var(--bg-alt);
            color: var(--text);
            margin-top: 10px;
        }
        .btn-secondary:hover { background: var(--border); }

        /* ===== Organizer ===== */
        .organizer-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .organizer-avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-light), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 1.125rem;
        }
        .organizer-details { flex: 1; }
        .organizer-name {
            font-size: 0.9375rem;
            font-weight: 600;
            color: var(--text);
            margin: 0;
        }
        .organizer-email {
            font-size: 0.8125rem;
            color: var(--text-muted);
            margin: 2px 0 0;
        }

        /* ===== Bookings List ===== */
        .bookings-section {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            padding: 24px;
            margin-top: 32px;
        }
        .bookings-title {
            margin: 0 0 20px;
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text);
        }
        .bookings-list { list-style: none; margin: 0; padding: 0; }
        .booking-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid var(--border);
        }
        .booking-item:last-child { border-bottom: none; }
        .booking-user { display: flex; align-items: center; gap: 12px; }
        .booking-avatar {
            width: 36px;
            height: 36px;
            background: var(--bg-alt);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.8125rem;
        }
        .booking-name {
            font-size: 0.9375rem;
            font-weight: 500;
            color: var(--text);
        }
        .booking-email {
            font-size: 0.8125rem;
            color: var(--text-muted);
        }
        .booking-seats {
            padding: 6px 12px;
            background: var(--bg-alt);
            border-radius: 6px;
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--text);
        }
        .empty-bookings {
            text-align: center;
            padding: 24px;
            color: var(--text-muted);
            font-size: 0.9375rem;
        }

        /* ===== Footer ===== */
        .footer {
            margin-top: 64px;
            padding: 32px 0;
            background: var(--white);
            border-top: 1px solid var(--border);
        }
        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }
        .footer-copy { font-size: 0.875rem; color: var(--text-muted); }
        .footer-links { display: flex; gap: 24px; }
        .footer-link { font-size: 0.875rem; color: var(--text-muted); transition: var(--transition); }
        .footer-link:hover { color: var(--text); }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .event-header { padding: 24px; }
            .event-title { font-size: 1.5rem; }
            .event-body { padding: 24px; }
            .nav-cta { display: none; }
        }
    </style>
</head>
<body>
    {{-- Header --}}
    <header class="header">
        <div class="container header-inner">
            <a href="/" class="brand">
                <span class="brand-icon">X</span>
                <span>XPass</span>
            </a>
            <nav class="nav">
                <a href="/events" class="nav-link active">Events</a>
                <a href="#" class="nav-link">About</a>
                <a href="#" class="nav-link">Contact</a>
                <a href="#" class="nav-cta">Sign In</a>
            </nav>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="container main">
        {{-- Breadcrumb --}}
        <nav class="breadcrumb">
            <a href="/events">Events</a>
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
            </svg>
            <span>{{ $event->title }}</span>
        </nav>

        <div class="detail-grid">
            {{-- Event Main Card --}}
            <div class="event-main">
                <div class="event-header">
                    @if(!empty($event->category))
                        <span class="event-badge">{{ $event->category }}</span>
                    @endif
                    <h1 class="event-title">{{ $event->title }}</h1>
                    <div class="event-meta">
                        <div class="event-meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                            {{ $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('l, M j, Y') : 'Date TBA' }}
                        </div>
                        <div class="event-meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                            {{ $event->location ?? 'Online' }}
                        </div>
                        @if(!empty($event->available_tickets))
                        <div class="event-meta-item">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/>
                            </svg>
                            {{ $event->available_tickets }} tickets left
                        </div>
                        @endif
                    </div>
                </div>
                <div class="event-body">
                    <p class="section-label">About This Event</p>
                    <p class="event-description">{{ $event->description }}</p>
                </div>
            </div>

            {{-- Sidebar --}}
            <aside class="sidebar">
                {{-- Pricing Card --}}
                <div class="sidebar-card">
                    @if($event->price)
                        <div class="price-display">£{{ number_format($event->price, 2) }}</div>
                        <p class="price-note">per person</p>
                    @else
                        <span class="price-free">Free Event</span>
                        <p class="price-note" style="margin-top: 12px;">No payment required</p>
                    @endif
                    <a href="{{ url('/book/' . $event->id) }}" class="btn btn-primary">Book Now</a>
                    <button class="btn btn-secondary">Share Event</button>
                </div>

                {{-- Organizer Card --}}
                <div class="sidebar-card">
                    <h3 class="sidebar-card-title">Organizer</h3>
                    <div class="organizer-info">
                        <div class="organizer-avatar">
                            {{ strtoupper(substr($event->organizer->name ?? 'O', 0, 1)) }}
                        </div>
                        <div class="organizer-details">
                            <p class="organizer-name">{{ $event->organizer->name ?? 'Unknown' }}</p>
                            <p class="organizer-email">{{ $event->organizer->email ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        {{-- Bookings Section --}}
        @if($event->bookings && $event->bookings->count() > 0)
        <section class="bookings-section">
            <h2 class="bookings-title">Bookings ({{ $event->bookings->count() }})</h2>
            <ul class="bookings-list">
                @foreach($event->bookings as $booking)
                    <li class="booking-item">
                        <div class="booking-user">
                            <div class="booking-avatar">
                                {{ strtoupper(substr($booking->user->name ?? 'U', 0, 1)) }}
                            </div>
                            <div>
                                <div class="booking-name">{{ $booking->user->name ?? 'Unknown' }}</div>
                                <div class="booking-email">{{ $booking->user->email ?? '' }}</div>
                            </div>
                        </div>
                        <span class="booking-seats">{{ $booking->seats_booked }} {{ $booking->seats_booked == 1 ? 'seat' : 'seats' }}</span>
                    </li>
                @endforeach
            </ul>
        </section>
        @endif
    </main>

    {{-- Footer --}}
    <footer class="footer">
        <div class="container footer-inner">
            <span class="footer-copy">© {{ date('Y') }} XPass. All rights reserved.</span>
            <nav class="footer-links">
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Service</a>
                <a href="#" class="footer-link">Support</a>
            </nav>
        </div>
    </footer>
</body>
</html>