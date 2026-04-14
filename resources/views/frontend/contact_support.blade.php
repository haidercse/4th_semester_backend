<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Contact & Support</title>
    <meta name="description"
        content="Contact Dhamrai Clay Heritage — get in touch for visits, donations, volunteering, or workshop bookings.">
    <meta name="keywords" content="contact Dhamrai, donation, volunteer, pottery support, pottery contact">
    <meta name="author" content="Dhamrai Clay Heritage Project">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Contact & Support — Dhamrai Clay Heritage">
    <meta property="og:description"
        content="Get in touch with Dhamrai Clay Heritage for visit planning, support, and workshop bookings.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="contact_support.html">
    <meta name="twitter:card" content="summary">
    <link rel="stylesheet" href="shared.css">
</head>

<body>
    @include('frontend.topbar');

    <section class="hero"
        style="background-image: url('img/contact_type.webp'); background-size: cover; background-position: center;">
        <div class="container">
            <h1>Contact &amp; Support</h1>
            <p>Get in touch with us or support our heritage preservation efforts</p>
        </div>
    </section>

    <main class="container">
        <h3 class="section-title">Get in Touch</h3>
        <div class="grid" style="margin-bottom:18px">
            <div class="card center">
                <div style="text-align:center" class="h-card"><strong>Address</strong>
                    <p class="p-adr"><span class="p-street-address">Kakran Village</span>, <span
                            class="p-locality">Dhamrai</span>, <span class="p-region">Dhaka</span>, <span
                            class="p-country-name">Bangladesh</span></p>
                </div>
            </div>
            <div class="card center">
                <div style="text-align:center"><strong>Phone</strong>
                    <p><a class="p-tel" href="tel:+880000000000">+880 000-0000000</a></p>
                </div>
            </div>
            <div class="card center">
                <div style="text-align:center"><strong>Email</strong>
                    <p><a class="u-email" href="mailto:info@dhamraiclay.org">info@dhamraiclay.org</a></p>
                </div>
            </div>
            <div class="card center">
                <div style="text-align:center"><strong>Opening Hours</strong>
                    <p>Sat-Thu 9:00 AM - 5:00 PM</p>
                </div>
            </div>
        </div>

        <section style="margin-top:20px">
            <h3 class="section-title">Send Us a Message</h3>
            <div class="form-card" style="max-width:700px;margin:0 auto">
                <form class="form" method="POST" action="{{ route('contact.store') }}">
                    @csrf

                    <input name="name" placeholder="Full Name" required>

                    <input name="email" placeholder="Email Address" type="email" required>

                    <select name="subject">
                        <option value="General inquiry">General inquiry</option>
                        <option value="Booking">Booking</option>
                    </select>

                    <textarea name="message" placeholder="Message" required></textarea>

                    <div class="center">
                        <button class="cta" type="submit">Send Message</button>
                    </div>
                </form>

                @if (session('success'))
                    <p style="color:green; text-align:center">{{ session('success') }}</p>
                @endif
            </div>
        </section>

        <section style="margin-top:30px" class="cards">
            <div class="card">
                <h3>Make a Donation</h3>
                <p>Support our preservation efforts.</p><a class="btn" href="#">Donate Now</a>
            </div>
            <div class="card">
                <h3>Shop Our Collection</h3>
                <p>Every purchase supports artisans.</p><a class="btn" href="gallery_shop.html">Visit Shop</a>
            </div>
            <div class="card">
                <h3>Volunteer With Us</h3>
                <p>Join our team and contribute.</p><a class="btn" href="#">Get Involved</a>
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
