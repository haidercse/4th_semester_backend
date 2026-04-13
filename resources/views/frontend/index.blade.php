<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home - Dhamrai Clay Heritage</title>
    <meta name="description"
        content="Dhamrai Clay Heritage — preserving the traditional pottery of Kakran. Explore artisan profiles, workshops, gallery and handcrafted pottery for sale.">
    <meta name="keywords"
        content="Dhamrai pottery, Kakran pottery, traditional pottery, handmade pottery, pottery workshop, Dhaka pottery, terracotta">
    <meta name="author" content="Dhamrai Clay Heritage Project">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Dhamrai Clay Heritage — Traditional Pottery of Dhamrai">
    <meta property="og:description"
        content="Discover the pottery heritage of Kakran — artisan profiles, workshops, and handcrafted pottery for sale.">
    <meta property="og:image" content="img/1.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="index.html">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="stylesheet" href="shared.css">
</head>

<body>
    @include('frontend.topbar');

    <section class="hero" data-hero-src="img/1.jpg">
        <div class="hero-bg" aria-hidden="true"></div>
        <button class="hero-nav hero-prev" aria-label="Previous slide">‹</button>
        <button class="hero-nav hero-next" aria-label="Next slide">›</button>
        <!-- Example slides: replace `assets/slide1.jpg` and `assets/slide2.jpg` with your images in `assets/` -->
        <div class="slide" style="background-image:url('img/slide1.jpg')" aria-hidden="true"></div>
        <div class="slide" style="background-image:url('img/slide2.jpg')" aria-hidden="true"></div>
        <div class="container hero-content">
            <h1>Traditional Pottery of Dhamrai</h1>
            <p>Discover Centuries of Craftsmanship</p>
            <a class="cta" href="plan_visit.html">Explore the Heritage</a>
        </div>
    </section>

    @php
        $explore = App\Models\Form::where('header_name', 'Explore_Dhamrai_Clay_Heritage')->get();
        $process = App\Models\Form::where('header_name', 'The_Pottery_Making_Process')->get();
    @endphp

    <main class="container">

        {{-- ================= EXPLORE ================= --}}
        <h2 class="section-title">Explore Dhamrai Clay Heritage</h2>

        <div class="cards">

            @if ($explore->count() > 0)

                @foreach ($explore as $item)
                    <article class="card">
                        <div class="img">
                            <img src="{{ asset($item->image ?? 'img/shop1.jpg') }}">
                        </div>
                        <div class="card-body">
                            <h3>{{ $item->name ?? 'Art & Process' }}</h3>
                            <p>{{ $item->description ?? 'Learn about the traditional techniques passed down through generations.' }}
                            </p>
                            <a class="btn" href="#">Learn More</a>
                        </div>
                    </article>
                @endforeach
            @else
                {{-- Default --}}
                <article class="card">
                    <div class="img">
                        <img src="img/shop1.jpg">
                    </div>
                    <div class="card-body">
                        <h3>Art & Process</h3>
                        <p>Learn about the traditional techniques passed down through generations.</p>
                    </div>
                </article>

                <article class="card">
                    <div class="img">
                        <img src="img/shop2.jpg">
                    </div>
                    <div class="card-body">
                        <h3>Meet the Potters</h3>
                        <p>Get to know the master artisans keeping this craft alive.</p>
                    </div>
                </article>

                <article class="card">
                    <div class="img">
                        <img src="img/shop3.webp">
                    </div>
                    <div class="card-body">
                        <h3>Shop Collection</h3>
                        <p>Browse and purchase authentic handcrafted pottery pieces.</p>
                    </div>
                </article>

            @endif

        </div>


        {{-- ================= PROCESS ================= --}}
        <section class="process">

            <h3 class="section-title">The Pottery Making Process</h3>

            <div class="process-grid">

                @if ($process->count() > 0)

                    @foreach ($process as $item)
                
                        <div class="card">
                            <div class="img">
                                <img src="{{ asset($item->image ?? 'img/clay_preparation.jpg') }}">
                            </div>
                            <div class="card-body">
                                <strong>{{ $item->name ?? '1. Clay Preparation' }}</strong>
                                <p>{{ $item->description ?? 'Local clay is carefully sourced and prepared.' }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Default --}}
                    <div class="card">
                        <div class="img">
                            <img src="img/clay_preparation.jpg">
                        </div>
                        <div class="card-body">
                            <strong>1. Clay Preparation</strong>
                            <p>Local clay is carefully sourced and prepared.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="img">
                            <img src="img/hand_shape.jpg">
                        </div>
                        <div class="card-body">
                            <strong>2. Hand Shaping</strong>
                            <p>Master potters shape each piece using a traditional wheel.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="img">
                            <img src="img/drying_process.jpg">
                        </div>
                        <div class="card-body">
                            <strong>3. Drying Process</strong>
                            <p>Pieces are sun-dried under controlled conditions.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="img">
                            <img src="img/kilin_fring.jpg">
                        </div>
                        <div class="card-body">
                            <strong>4. Kiln Firing</strong>
                            <p>Traditional kilns fire the pottery to create lasting pieces.</p>
                        </div>
                    </div>

                @endif

            </div>

        </section>

    </main>

    <footer>
        <div class="container footer-grid">
            <div><strong>Dhamrai Clay Heritage Project</strong>
                <p>Preserving the traditional pottery heritage of Kakran, Dhamrai.</p>
            </div>
            <div><a>Home</a><a>Meet the Potters</a><a>Gallery & Shop</a></div>
            <div style="text-align:right">
                <p>Authors:<br>Khan Abul Forhad<br>Uddin Md Main<br>Islam Shaiful</p>
            </div>
        </div>
    </footer>

    <script>
        // MENU: Slide-in menu, animated hamburger, keyboard support
        document.addEventListener('DOMContentLoaded', function() {
            // set hero background image from data attribute (e.g. data-hero-src="assets/hero.jpg")
            try {
                document.querySelectorAll('.hero').forEach(function(h) {
                    var src = h.getAttribute('data-hero-src');
                    var bg = h.querySelector('.hero-bg');
                    if (src && bg) {
                        bg.style.backgroundImage = 'url("' + src + '")';
                    }
                });
            } catch (e) {
                console.log('hero-bg load error', e);
            }
            // create mobile controls if not present
            const topbar = document.querySelector('.topbar');
            if (topbar) {
                // add mobile hamburger and right logo if not present (safe to add even if exists)
                if (!document.getElementById('mobile-hamburger')) {
                    const btn = document.createElement('button');
                    btn.id = 'mobile-hamburger';
                    btn.className = 'mobile-hamburger';
                    btn.setAttribute('aria-label', 'Open menu');
                    btn.setAttribute('aria-expanded', 'false');
                    btn.innerHTML =
                        '<span class="bar bar1"></span><span class="bar bar2"></span><span class="bar bar3"></span>';
                    // insert into topbar
                    topbar.appendChild(btn);
                    // right logo container (if not exists)
                    if (!document.querySelector('.mobile-logo-right')) {
                        const logoBox = document.createElement('div');
                        logoBox.className = 'mobile-logo-right';
                        // logoBox.innerHTML = '<div class="logo-square">DCH</div><div class="logo-text">Dhamrai Clay Heritage</div>';
                        topbar.appendChild(logoBox);
                    }
                    // create slide menu
                    const menu = document.createElement('nav');
                    menu.id = 'slide-menu';
                    menu.className = 'slide-menu';
                    menu.setAttribute('aria-hidden', 'true');
                    menu.setAttribute('aria-label', 'Mobile Navigation');
                    menu.innerHTML =
                        '<button class=\"slide-close\" aria-label=\"Close menu\">×</button><a href=\"index.html\">Home</a><a href=\"meet_potters.html\">Meet the Potters</a><a href=\"gallery_shop.html\">Gallery & Shop</a><a href=\"plan_visit.html\">Plan Your Visit</a><a href=\"contact_support.html\">Contact & Support</a>';
                    document.body.appendChild(menu);
                    // toggle behavior
                    function toggleMenu(open) {
                        const root = document.documentElement;
                        const isOpen = menu.classList.contains('open');
                        if (open === undefined) open = !isOpen;
                        if (open) {
                            menu.classList.add('open');
                            root.classList.add('hamburger-open');
                            document.getElementById('mobile-hamburger').setAttribute('aria-expanded', 'true');
                            menu.setAttribute('aria-hidden', 'false');
                            // trap focus
                            menu.querySelector('a').focus();
                            document.body.style.overflow = 'hidden';
                        } else {
                            menu.classList.remove('open');
                            root.classList.remove('hamburger-open');
                            document.getElementById('mobile-hamburger').setAttribute('aria-expanded', 'false');
                            menu.setAttribute('aria-hidden', 'true');
                            document.body.style.overflow = '';
                            document.getElementById('mobile-hamburger').focus();
                        }
                    }
                    btn.addEventListener('click', function(e) {
                        toggleMenu();
                    });
                    // keyboard support: Esc closes menu, Tab cycles inside
                    document.addEventListener('keydown', function(e) {
                        const isOpen = menu.classList.contains('open');
                        if (e.key === 'Escape' && isOpen) {
                            toggleMenu(false);
                        }
                    });
                    // close when clicking outside
                    menu.addEventListener('click', function(e) {
                        if (e.target.tagName === 'A') {
                            toggleMenu(false);
                        }
                        if (e.target.classList && e.target.classList.contains('slide-close')) {
                            toggleMenu(false);
                        }
                    });
                }
            }

            // HERO SLIDER: support slides, prev/next buttons and autoplay
            try {
                const hero = document.querySelector('.hero');
                if (hero && hero.dataset.autoplay !== 'off') {
                    const slides = hero.querySelectorAll('.slide');
                    const prevBtn = hero.querySelector('.hero-prev');
                    const nextBtn = hero.querySelector('.hero-next');
                    if (slides.length > 0) {
                        const bg = hero.querySelector('.hero-bg');
                        if (bg) bg.style.display = 'none';
                        let idx = 0;
                        const show = (i) => {
                            slides.forEach((s, j) => {
                                s.style.display = j === i ? 'block' : 'none';
                            });
                            idx = (i + slides.length) % slides.length;
                        };
                        show(0);
                        let interval = null;
                        const start = () => {
                            stop();
                            if (hero.dataset.autoplay === 'off') return;
                            interval = setInterval(() => {
                                show((idx + 1) % slides.length);
                            }, parseInt(hero.dataset.interval) || 4500);
                        };
                        const stop = () => {
                            if (interval) {
                                clearInterval(interval);
                                interval = null;
                            }
                        };
                        if (prevBtn) prevBtn.addEventListener('click', () => {
                            show((idx - 1 + slides.length) % slides.length);
                            start();
                        });
                        if (nextBtn) nextBtn.addEventListener('click', () => {
                            show((idx + 1) % slides.length);
                            start();
                        });
                        hero.addEventListener('mouseenter', stop);
                        hero.addEventListener('mouseleave', start);
                        start();
                    } else {
                        // no slides — hide nav buttons (not needed when using single background)
                        if (prevBtn) prevBtn.style.display = 'none';
                        if (nextBtn) nextBtn.style.display = 'none';
                    }
                }
            } catch (e) {
                console.log('hero slider error', e);
            }

            // SIMPLE CART: add-to-cart using localStorage, update count badge
            function updateCartCount() {
                const cart = JSON.parse(localStorage.getItem('dch_cart') || '[]');
                const elems = document.querySelectorAll('.cart-count');
                elems.forEach(el => el.textContent = cart.length);
            }
            updateCartCount();
            document.body.addEventListener('click', function(e) {
                const t = e.target;
                if (t && t.matches && (t.matches('.add-btn') || t.matches('.add-to-cart') || t.closest(
                        '.add-btn'))) {
                    // get product title & price from nearest product card
                    const card = t.closest('.product') || t.closest('.card') || t.closest('article');
                    if (!card) return;
                    const title = (card.querySelector('strong') && card.querySelector('strong')
                        .innerText) || card.querySelector('h3')?.innerText || 'Product';
                    const priceEl = card.querySelector('.price');
                    const priceText = priceEl ? priceEl.innerText.replace(/[^\d]/g, '') : '0';
                    const product = {
                        title: title.trim(),
                        price: priceText
                    };
                    const cart = JSON.parse(localStorage.getItem('dch_cart') || '[]');
                    cart.push(product);
                    localStorage.setItem('dch_cart', JSON.stringify(cart));
                    updateCartCount();
                    // simple feedback
                    t.innerText = 'Added';
                    t.disabled = true;
                    setTimeout(() => {
                        t.innerText = 'Add to Cart';
                        t.disabled = false;
                    }, 1200);
                }
            });

            // Accessibility: ensure images have alt attribute; add role where missing
            document.querySelectorAll('img').forEach(img => {
                if (!img.hasAttribute('alt')) img.setAttribute('alt', 'Image placeholder');
            });
        });
    </script>

</body>

</html>
