<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Meet the Potters</title>
    <meta name="description"
        content="Meet the master potters of Dhamrai — profiles of artisans preserving traditional pottery techniques, their stories, and workshops.">
    <meta name="keywords"
        content="meet the potters, potters profiles, Dhamrai artisans, pottery heritage, Kakran potters">
    <meta name="author" content="Dhamrai Clay Heritage Project">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Meet the Potters — Dhamrai Clay Heritage">
    <meta property="og:description"
        content="Profiles and stories of the master artisans preserving Dhamrai's pottery heritage.">
    <meta property="og:image" content="img/slide1.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="meet_potters.html">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="stylesheet" href="shared.css">
</head>

<body>
    @include('frontend.topbar');

    <section class="hero"
        style="background-image: url('img/slide1.jpg'); background-size: cover; background-position: center;">
        <div class="container">
            <h1>Meet the Potters</h1>
            <p>The master artisans preserving Dhamrai's pottery heritage</p>
        </div>
    </section>

    @php
        $artisans = App\Models\Form::where('header_name', 'Our_Master_Artisans')->get();
        

    @endphp

    <main class="container">

        <h3 class="section-title">Our Master Artisans</h3>

        <div class="grid">

            @if ($artisans->count() > 0)

                @foreach ($artisans as $item)
                    <article class="product">
                        <div class="pimg">
                            <img src="{{ $item->image ? asset($item->image) : asset('img/abdul.jpeg') }}">
                        </div>

                        <div class="pinfo">
                            <div>
                                <strong>{{ $item->name ?? 'Artisan Name' }}</strong>

                                <div style="color:#666;font-size:13px">
                                    {{ $item->text ?? 'Experience Info' }}
                                </div>

                                <p style="color:#666;margin-top:8px">
                                    {{ $item->description ?? 'Short description here.' }}
                                </p>
                            </div>

                            <div>
                                <a href="#" class="read-btn">Read Full Story →</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                {{-- Default Static --}}
                <article class="product">
                    <div class="pimg"><img src="img/abdul.jpeg"></div>
                    <div class="pinfo">
                        <strong>Abdul Karim</strong>
                        <div style="color:#666;font-size:13px">Master Potter — 40+ years</div>
                        <p style="color:#666;margin-top:8px">A dedicated artisan committed to preserving traditional
                            pottery techniques.</p>
                    </div>
                </article>

                <article class="product">
                    <div class="pimg"><img src="img/fatema.jpeg"></div>
                    <div class="pinfo">
                        <strong>Fatima Begum</strong>
                        <div style="color:#666;font-size:13px">Senior Artisan — 35+ years</div>
                        <p style="color:#666;margin-top:8px">Leader in decoration and surface treatment.</p>
                    </div>
                </article>

                <article class="product">
                    <div class="pimg"><img src="img/rehman.jpeg"></div>
                    <div class="pinfo">
                        <strong>Rahman Ali</strong>
                        <div style="color:#666;font-size:13px">Master Potter — 30+ years</div>
                        <p style="color:#666;margin-top:8px">Specialist in large vessels and storage jars.</p>
                    </div>
                </article>

            @endif

        </div>


        {{-- ================= HISTORY ================= --}}
        <section style="margin-top:40px" class="card history-card">
            <div style="padding:20px">
                <h3 style="text-align:center">History of the Craft</h3>
                <ul class="timeline">

                    <li><span class="year">1800s</span>
                        <p>Pottery tradition begins in Kakran</p>
                    </li>

                    <li><span class="year">1950s</span>
                        <p>Community of artisans formally established</p>
                    </li>

                    <li><span class="year">1980s</span>
                        <p>Traditional techniques documented</p>
                    </li>

                    <li><span class="year">2000s</span>
                        <p>Heritage recognition & support programs launched</p>
                    </li>

                    <li><span class="year">2020s</span>
                        <p>Digital documentation and outreach</p>
                    </li>

                </ul>
            </div>
        </section>

        <div style="margin-top:30px" class="card center">
            <a class="cta" href="#">Book a Workshop</a>
        </div>

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

            // SIMPLE CAROUSEL AUTOPLAY for elements with class .hero (if multiple slides exist)
            try {
                const hero = document.querySelector('.hero');
                if (hero && hero.dataset.autoplay !== 'off') {
                    // if slides inside .hero .slides, implement auto rotate
                    const slides = hero.querySelectorAll('.slide');
                    if (slides.length > 1) {
                        let idx = 0;
                        slides.forEach((s, i) => s.style.display = i === 0 ? 'block' : 'none');
                        setInterval(() => {
                            slides[idx].style.display = 'none';
                            idx = (idx + 1) % slides.length;
                            slides[idx].style.display = 'block';
                        }, 4500);
                    }
                }
            } catch (e) {
                console.log(e);
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
