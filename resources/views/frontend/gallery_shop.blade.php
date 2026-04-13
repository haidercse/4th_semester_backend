<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gallery & Shop</title>
    <meta name="description"
        content="Browse the Gallery & Shop: authentic handcrafted pottery from Dhamrai. Shop vases, bowls, pots and decorative pieces made by local artisans.">
    <meta name="keywords"
        content="pottery shop, handmade pottery, Dhamrai gallery, pottery for sale, terracotta, pottery collection">
    <meta name="author" content="Dhamrai Clay Heritage Project">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Gallery & Shop — Dhamrai Clay Heritage">
    <meta property="og:description"
        content="Shop authentic handcrafted pottery from Dhamrai — vases, bowls, pots and decorative pieces.">
    <meta property="og:image" content="img/gal_main.jpeg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="gallery_shop.html">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="stylesheet" href="shared.css">
    <style>
        <style>@keyframes fadeIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
    </style>
</head>

<body>
    @include('frontend.topbar');

    <section class="hero"
        style="background-image: url('img/gal_main.jpeg'); background-size: cover; background-position: center;">
        <div class="container">
            <h1>Gallery &amp; Shop</h1>
            <p>Browse our collection of authentic handcrafted pottery</p>
        </div>
    </section>

    @php
        $gallery = App\Models\Form::where('header_name', 'gallery')->get();
    @endphp

    <main class="container">


        <div style="margin-bottom:18px">
            <nav style="display:flex;gap:10px;flex-wrap:wrap">
                <a style="background:#0b1220;color:#fff;padding:8px 12px;border-radius:4px;text-decoration:none">All</a>
                <a
                    style="border:1px solid rgba(11,18,32,0.06);padding:8px 12px;border-radius:4px;text-decoration:none">Vases</a>
                <a
                    style="border:1px solid rgba(11,18,32,0.06);padding:8px 12px;border-radius:4px;text-decoration:none">Bowls</a>
            </nav>
        </div>

        <div class="grid">

            @if ($gallery->count() > 0)

                @foreach ($gallery as $item)
                    <article class="product">
                        <div class="pimg">
                            <img src="{{ $item->image ? asset($item->image) : asset('img/gal1.jpeg') }}">
                        </div>

                        <div class="pinfo">
                            <div>
                                <strong>{{ $item->name ?? 'Product Name' }}</strong>

                                <div class="price">
                                    ৳ {{ $item->price ?? '0' }}
                                </div>
                            </div>

                            <div>
                                <a class="add-btn" href="#">Add to Cart</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                {{-- Default Static --}}
                <article class="product">
                    <div class="pimg"><img src="img/gal1.jpeg"></div>
                    <strong>Product 1</strong>
                    <div class="price">৳ 1100</div>
                </article>

                <article class="product">
                    <div class="pimg"><img src="img/gal2.jpeg"></div>
                    <strong>Product 2</strong>
                    <div class="price">৳ 1200</div>
                </article>

                <article class="product">
                    <div class="pimg"><img src="img/gal3.jpeg"></div>
                    <strong>Product 3</strong>
                    <div class="price">৳ 1300</div>
                </article>

            @endif

        </div>

        {{-- Pagination static রাখতে পারো --}}
        <div class="pagination">
            <a style="padding:8px 12px;border:1px solid #ddd;border-radius:4px">&lt;</a>
            <a style="padding:8px 12px;background:#0b1220;color:#fff;border-radius:4px">1</a>
            <a style="padding:8px 12px;border:1px solid #ddd;border-radius:4px">2</a>
            <a style="padding:8px 12px;border:1px solid #ddd;border-radius:4px">&gt;</a>
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
    <!-- CHECKOUT MODAL -->
    <div id="checkoutModal"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
    background:rgba(0,0,0,0.65); z-index:9999; backdrop-filter:blur(4px);">

        <div
            style="background:#ffffff; width:420px; max-width:92%; margin:70px auto;
        padding:25px; border-radius:14px; position:relative;
        box-shadow:0 15px 40px rgba(0,0,0,0.25);
        animation:fadeIn 0.25s ease-in-out; font-family:Arial;">

            <!-- Close Button -->
            <button onclick="closeModal()"
                style="position:absolute; right:12px; top:10px;
            background:#f3f3f3; border:none; width:32px; height:32px;
            border-radius:50%; cursor:pointer; font-size:16px;">
                ✕
            </button>

            <h3 style="margin-bottom:18px; font-size:20px; text-align:center; color:#222;">
                Checkout Form
            </h3>

            <form method="POST" action="{{ route('checkout.store') }}">

                @csrf

                <input type="hidden" name="product_name" id="product_name">
                <input type="hidden" name="price" id="price">

                <!-- Name -->
                <div style="margin-bottom:12px;">
                    <label style="font-size:13px; color:#444;">Name</label>
                    <input type="text" name="customer_name"
                        style="width:100%; padding:10px; border:1px solid #ddd;
                    border-radius:8px; outline:none;"
                        placeholder="Enter your name">
                </div>

                <!-- Phone -->
                <div style="margin-bottom:12px;">
                    <label style="font-size:13px; color:#444;">Phone</label>
                    <input type="text" name="phone"
                        style="width:100%; padding:10px; border:1px solid #ddd;
                    border-radius:8px; outline:none;"
                        placeholder="Enter phone number">
                </div>

                <!-- Address -->
                <div style="margin-bottom:12px;">
                    <label style="font-size:13px; color:#444;">Address</label>
                    <textarea name="address" rows="3"
                        style="width:100%; padding:10px; border:1px solid #ddd;
                    border-radius:8px; outline:none; resize:none;"
                        placeholder="Full address"></textarea>
                </div>

                <!-- Quantity -->
                <div style="margin-bottom:18px;">
                    <label style="font-size:13px; color:#444;">Quantity</label>
                    <input type="number" name="quantity" value="1" min="1"
                        style="width:100%; padding:10px; border:1px solid #ddd;
                    border-radius:8px; outline:none;">
                </div>

                <!-- Submit -->
                <button type="submit"
                    style="width:100%; padding:12px;
                background:linear-gradient(135deg,#0b1220,#1f2937);
                color:white; border:none; border-radius:10px;
                cursor:pointer; font-size:15px; font-weight:bold;">
                    Submit Order
                </button>

            </form>
        </div>
    </div>
    <script>
        document.body.addEventListener('click', function(e) {
            const t = e.target;

            if (t && (t.matches('.add-btn') || t.closest('.add-btn'))) {

                const card = t.closest('.product');

                const title = card.querySelector('strong')?.innerText || 'Product';
                const priceEl = card.querySelector('.price');
                const price = priceEl ? priceEl.innerText.replace(/[^\d]/g, '') : '0';

                // Set form values
                document.getElementById('product_name').value = title;
                document.getElementById('price').value = price;

                // Open modal
                document.getElementById('checkoutModal').style.display = 'block';
            }
        });

        // Close modal
        function closeModal() {
            document.getElementById('checkoutModal').style.display = 'none';
        }
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
