@extends('layouts.app')

@section('title', 'DistroxERP - Gestión de Almacenes, Compras y Ventas')

@section('content')
    @include('sections.hero')
    @include('sections.features')
    @include('sections.how-it-works')
    @include('sections.benefits')
    @include('sections.stats')
    @include('sections.testimonials')
    @include('sections.pricing')
    @include('sections.cta')
    @include('sections.faq')
    @include('sections.contact')
    <!-- Back to top button -->
    <a href="#" class="fixed bottom-6 right-6 bg-primary hover:bg-primary/90 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-colors">
        <i class="fas fa-arrow-up"></i>
    </a>
@endsection

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb', // Azul moderno
                        secondary: '#1e293b', // Slate-800
                        accent: '#f97316', // Naranja para acentos
                        light: '#f8fafc', // Fondo claro
                        dark: '#0f172a', // Fondo oscuro
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        /* Animaciones sutiles */
        .hover-up {
            transition: transform 0.3s ease;
        }
        .hover-up:hover {
            transform: translateY(-5px);
        }

        /* Gradientes */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
        }

        .bg-gradient-dark {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        }

        /* Formas decorativas */
        .shape-blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }

        /* Animación de entrada */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease forwards;
        }

        /* Animación para el scroll */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Mobile menu animations */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            height: calc(100dvh - 76px);
            top: 76px;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .menu-backdrop {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .menu-backdrop.active {
            opacity: 1;
            visibility: visible;
        }

        /* FAQ animations */
        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(0, 1, 0, 1);
        }

        .faq-content.active {
            max-height: 1000px;
            transition: max-height 1s ease-in-out;
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-icon.active {
            transform: rotate(180deg);
        }

        /* Swiper customization */
        .swiper {
            width: 100%;
            padding-bottom: 50px;
        }

        .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #2563eb;
            opacity: 0.5;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #2563eb;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.querySelector('.mobile-menu');
            const menuBackdrop = document.getElementById('menu-backdrop');
            const menuLinks = document.querySelectorAll('.mobile-menu a');

            function toggleMenu() {
                mobileMenu.classList.toggle('active');
                menuBackdrop.classList.toggle('active');

                // Toggle menu icon
                const icon = menuToggle.querySelector('i');
                if (mobileMenu.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }

            menuToggle.addEventListener('click', toggleMenu);
            menuBackdrop.addEventListener('click', toggleMenu);

            menuLinks.forEach(link => {
                link.addEventListener('click', toggleMenu);
            });

            // Scroll reveal
            const revealElements = document.querySelectorAll('.reveal');

            function checkReveal() {
                const windowHeight = window.innerHeight;
                const revealPoint = 150;

                revealElements.forEach(element => {
                    const revealTop = element.getBoundingClientRect().top;

                    if (revealTop < windowHeight - revealPoint) {
                        element.classList.add('active');
                    }
                });
            }

            window.addEventListener('scroll', checkReveal);
            window.addEventListener('load', checkReveal);

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // FAQ toggles
            const faqToggles = document.querySelectorAll('.faq-toggle');

            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('.faq-icon');

                    content.classList.toggle('active');
                    icon.classList.toggle('active');
                });
            });

            // Initialize Swiper
            const swiper = new Swiper('.testimonialSwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: false,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        });
    </script>

@endpush
