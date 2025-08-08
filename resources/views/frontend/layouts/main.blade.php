<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nabawi Barokah - Umroh Amanah & Eksklusif')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend-assets/images/logo.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: '#2E7D5D', // Softer green
                        'emerald-light': '#58A98A',
                        'emerald-dark': '#1B5942',
                        gold: '#E6C27A', // Brighter gold
                        'gold-dark': '#D0AC62'
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script> --}}

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @vite('resources/css/app.css')

    @stack('style')
</head>

<body class="font-poppins bg-white">
    <!-- Countdown Bar -->
    @if ($announcement)
        <div
            class="countdown-bar relative text-white text-center py-1.5 px-4 text-sm md:text-base font-semibold tracking-wide">
            <div class="flex items-center justify-center space-x-2 animate-pulse">
                <i class="fas fa-bullhorn text-white text-base md:text-lg"></i>
                <span>{!! $announcement->text !!}</span>
            </div>
        </div>
    @endif

    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ $wa }}" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp" style="margin-top: 16px;"></i>
    </a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu functionality
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const closeMenuBtn = document.getElementById('close-menu');
            const menuOverlay = document.getElementById('menu-overlay');

            function openMobileMenu() {
                mobileMenu.classList.add('open');
                menuOverlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeMobileMenu() {
                mobileMenu.classList.remove('open');
                menuOverlay.classList.add('hidden');
                document.body.style.overflow = '';
            }

            mobileMenuBtn.addEventListener('click', openMobileMenu);
            closeMenuBtn.addEventListener('click', closeMobileMenu);
            menuOverlay.addEventListener('click', closeMobileMenu);

            // Close menu when clicking on menu links
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', closeMobileMenu);
            });

            // Intersection Observer for fade animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            // Observe all elements with fade classes
            document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right, .fade-in-up, .fade-in-scale')
                .forEach(el => {
                    observer.observe(el);
                });

            // Add smooth scrolling for anchor links with offset for sticky header
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const target = document.querySelector(targetId);
                    if (target) {
                        const headerHeight = document.querySelector('header').offsetHeight;
                        const targetPosition = target.offsetTop - headerHeight - 20;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Form submission handler
            //  document.querySelector('form').addEventListener('submit', function(e) {
            //      e.preventDefault();
            //      const nama = this.querySelector('input[type="text"]').value;
            //      const phone = this.querySelector('input[type="tel"]').value;
            //      const paket = this.querySelector('select').value;
            //      const pesan = this.querySelector('textarea').value;

            //      const whatsappMessage =
            //          `Halo Nabawi Barokah, saya ${nama} (${phone}) tertarik dengan ${paket}. ${pesan}`;
            //      const whatsappUrl =
            //          `https://wa.me/6281234567890?text=${encodeURIComponent(whatsappMessage)}`;
            //      window.open(whatsappUrl, '_blank');
            //  });

            // Enhanced card hover effects
            document.querySelectorAll('.card-hover').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Parallax effect for hero section
            //  window.addEventListener('scroll', () => {
            //      const scrolled = window.pageYOffset;
            //      const hero = document.querySelector('.hero-bg');
            //      if (hero) {
            //          hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            //      }
            //  });
        });
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'96828e84a587fd6f',t:'MTc1NDAyMjE3MC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @stack('script')
</body>

</html>
