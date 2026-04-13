<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Plan Your Visit</title>
    <meta name="description"
        content="Plan your visit to Kakran, Dhamrai — directions, opening hours, and workshop booking information to experience traditional pottery making.">
    <meta name="keywords"
        content="plan visit, how to get to Dhamrai, Kakran directions, pottery workshop booking, visit Dhamrai">
    <meta name="author" content="Dhamrai Clay Heritage Project">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Plan Your Visit — Dhamrai Clay Heritage">
    <meta property="og:description"
        content="Directions, opening hours, and booking info for visiting the pottery community in Kakran, Dhamrai.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="plan_visit.html">
    <meta name="twitter:card" content="summary">
    <link rel="stylesheet" href="shared.css">
</head>

<body>
    @include('frontend.topbar');

    <section class="hero">
        <div class="hero-bg" aria-hidden="true"
            style="background-image: url('img/plan_your_visit.png'); background-size: cover; background-position: center;">
        </div>
        <!-- off-screen img to provide alt text for assistive tech -->
        <img src="img/plan_your_visit.png"
            alt="Plan Your Visit - directions and visitor information for Kakran, Dhamrai" class="sr-only">
        <div class="container">
            <h1>Plan Your Visit</h1>
            <p>Everything you need to know for your journey to Kakran, Dhamrai</p>
        </div>
    </section>

    <main class="container">
        <h3 class="section-title">How to Get Here</h3>
        <div class="grid" style="margin-bottom:20px">
            <div class="card">
                <h4>By Car</h4>
                <ul style="color:#666">
                    <li>From Dhaka: 40 km, approx 1.5 hours</li>
                    <li>Take Dhaka-Aricha Highway</li>
                    <li>Turn at Dhamrai intersection</li>
                </ul>
            </div>
            <div class="card">
                <h4>By Public Transport</h4>
                <ul style="color:#666">
                    <li>Buses from Gabtoli Bus Terminal</li>
                    <li>Journey time: ~2 hours</li>
                </ul>
            </div>
        </div>

        <div class="map-contact">
            <div class="map"><iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7293.46003620391!2d90.2197575617815!3d23.93461252912255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755e8b4873bc37f%3A0x7bbb830f2022efad!2sKakran%2C%20Bangladesh!5e0!3m2!1sen!2scz!4v1763570778357!5m2!1sen!2scz"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            <aside class="contact-box">
                <h4>Location & Contact</h4>
                <p>Kakran Village, Dhamrai, Dhaka District</p>
                <p><strong>Opening Hours</strong><br>Sat-Thu 9:00 AM - 5:00 PM</p>
                <p><strong>Contact</strong><br>Phone: +880 000-0000000</p>
            </aside>
        </div>

        <section style="margin-top:30px">
            <h3 class="section-title">Book a Workshop</h3>

            @if (session('success'))
                <div style="color: green; text-align: center;">{{ session('success') }}</div>
            @endif

            <div class="form-card" style="max-width:700px;margin:0 auto">
                <form class="form" action="{{ route('workshop.store') }}" method="POST">
                    @csrf <input name="full_name" placeholder="Full Name" required>
                    <input name="email" placeholder="Email Address" type="email" required>
                    <input name="booking_date" type="date" required>

                    <select name="guests">
                        <option value="1">1 Person</option>
                        <option value="2">2 Persons</option>
                        <option value="3">3 Persons</option>
                    </select>

                    <textarea name="additional_info" placeholder="Additional information"></textarea>

                    <div class="center">
                        <button class="cta" type="submit">Submit Booking Request</button>
                    </div>
                </form>
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
