<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XPass — Discover Events</title>

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
        img { display: block; max-width: 100%; }

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

        /* ===== Hero Section ===== */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: var(--radius-lg);
            padding: 48px;
            margin-top: 32px;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-content { position: relative; z-index: 1; max-width: 600px; }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: rgba(255,255,255,0.2);
            border-radius: 20px;
            font-size: 0.8125rem;
            font-weight: 500;
            color: #fff;
            margin-bottom: 16px;
            backdrop-filter: blur(4px);
        }
        .hero-title {
            margin: 0;
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }
        .hero-subtitle {
            margin: 16px 0 0;
            font-size: 1.0625rem;
            color: rgba(255,255,255,0.85);
            line-height: 1.7;
        }
        .hero-stats {
            display: flex;
            gap: 32px;
            margin-top: 28px;
            padding-top: 24px;
            border-top: 1px solid rgba(255,255,255,0.2);
        }
        .stat { text-align: left; }
        .stat-value { font-size: 1.5rem; font-weight: 700; color: #fff; }
        .stat-label { font-size: 0.8125rem; color: rgba(255,255,255,0.7); margin-top: 2px; }

        /* ===== Filter Bar ===== */
        .filter-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin: 32px 0 24px;
        }
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text);
        }
        .view-toggle {
            display: flex;
            gap: 4px;
            padding: 4px;
            background: var(--bg-alt);
            border-radius: 8px;
        }
        .view-btn {
            padding: 8px 12px;
            font-size: 0.8125rem;
            font-weight: 500;
            color: var(--text-muted);
            background: transparent;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
        }
        .view-btn.active { background: var(--white); color: var(--text); box-shadow: var(--shadow-sm); }

        /* ===== Events Grid ===== */
        .events-grid {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(1, 1fr);
        }
        @media (min-width: 640px) { .events-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 1024px) { .events-grid { grid-template-columns: repeat(3, 1fr); } }

        /* ===== Event Card ===== */
        .event-card {
            background: var(--white);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            transition: var(--transition);
            border: 1px solid var(--border);
        }
        .event-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-light);
        }
        .card-badge {
            display: inline-block;
            padding: 4px 10px;
            background: rgba(99,102,241,0.1);
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 12px;
        }
        .card-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }
        .card-meta {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.8125rem;
            color: var(--text-muted);
            margin-bottom: 10px;
        }
        .card-meta-item { display: flex; align-items: center; gap: 4px; }
        .card-meta-item svg { width: 14px; height: 14px; }
        .card-title {
            margin: 0;
            font-size: 1.0625rem;
            font-weight: 600;
            color: var(--text);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .card-desc {
            margin: 8px 0 0;
            font-size: 0.875rem;
            color: var(--text-muted);
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid var(--border);
        }
        .card-price {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--text);
        }
        .card-price-free {
            padding: 4px 10px;
            background: #ecfdf5;
            color: #059669;
            border-radius: 6px;
            font-size: 0.8125rem;
            font-weight: 600;
        }
        .card-actions { display: flex; gap: 8px; }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 8px;
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
        }
        .btn-secondary:hover { background: var(--border); }

        /* ===== Empty State ===== */
        .empty-state {
            text-align: center;
            padding: 64px 24px;
            background: var(--white);
            border-radius: var(--radius);
            border: 2px dashed var(--border);
        }
        .empty-state svg { width: 64px; height: 64px; color: var(--text-light); margin-bottom: 16px; }
        .empty-state h3 { margin: 0 0 8px; font-size: 1.125rem; color: var(--text); }
        .empty-state p { margin: 0; color: var(--text-muted); }

        /* ===== Pagination ===== */
        .pagination-wrapper { margin-top: 40px; display: flex; justify-content: center; }

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
            .hero { padding: 32px 24px; }
            .hero-stats { gap: 24px; flex-wrap: wrap; }
            .nav-link { padding: 8px 12px; font-size: 0.875rem; }
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
    <main class="container">
        {{-- Hero Section --}}
        <section class="hero">
            <div class="hero-content">
                <span class="hero-badge">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    Featured Events
                </span>
                <h1 class="hero-title">Discover Unforgettable Experiences</h1>
                <p class="hero-subtitle">
                    Explore curated events in your area — from live concerts and workshops to exclusive community gatherings. Book your spot today.
                </p>
                <div class="hero-stats">
                    <div class="stat">
                        <div class="stat-value">500+</div>
                        <div class="stat-label">Events Monthly</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value">50K+</div>
                        <div class="stat-label">Happy Attendees</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value">100+</div>
                        <div class="stat-label">Trusted Organizers</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Filter Bar --}}
        <div class="filter-bar">
            <h2 class="section-title">Upcoming Events</h2>
            <div class="view-toggle">
                <button class="view-btn active">All</button>
                <button class="view-btn">This Week</button>
                <button class="view-btn">This Month</button>
            </div>
        </div>

        {{-- Events Grid --}}
        <section>
            @if($events->isEmpty())
                <div class="empty-state">
                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                    </svg>
                    <h3>No Events Available</h3>
                    <p>Check back soon for new events in your area.</p>
                </div>
            @else
                <div class="events-grid">
                    @foreach ($events as $event)
                        <article class="event-card">
                            <div class="card-body">
                                @if(!empty($event->category))
                                    <span class="card-badge">{{ $event->category }}</span>
                                @endif
                                <div class="card-meta">
                                    <span class="card-meta-item">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                                        </svg>
                                        {{ $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('M j, Y') : 'TBA' }}
                                    </span>
                                    <span class="card-meta-item">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                        </svg>
                                        {{ $event->location ?? 'Online' }}
                                    </span>
                                </div>

                                <h2 class="card-title">{{ $event->title }}</h2>
                                <p class="card-desc">{{ $event->description }}</p>

                                <div class="card-footer">
                                    @if($event->price)
                                        <span class="card-price">£{{ number_format($event->price, 2) }}</span>
                                    @else
                                        <span class="card-price-free">Free</span>
                                    @endif
                                    <div class="card-actions">
                                        <a href="{{ url('/events/' . $event->id) }}" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="pagination-wrapper">
                    {{ method_exists($events, 'links') ? $events->links() : '' }}
                </div>
            @endif
        </section>
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