<!-- Header -->
<header class="bg-white shadow-soft sticky top-0 z-[100]">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <div class="bg-primary rounded-lg p-2 mr-2">
                <i class="fas fa-cube text-white text-xl"></i>
            </div>
            <span class="text-xl font-bold text-secondary">Distrox<span class="text-primary">ERP</span></span>
        </div>
        <nav class="hidden md:flex space-x-8">
            <a href="#caracteristicas" class="text-secondary hover:text-primary font-medium transition-colors">Características</a>
            <a href="#beneficios" class="text-secondary hover:text-primary font-medium transition-colors">Beneficios</a>
            <a href="#precios" class="text-secondary hover:text-primary font-medium transition-colors">Precios</a>
            <a href="#testimonios" class="text-secondary hover:text-primary font-medium transition-colors">Testimonios</a>
        </nav>
        <div class="flex items-center space-x-4">
            <a href="#contacto" class="hidden md:inline-flex text-secondary hover:text-primary font-medium transition-colors">Contacto</a>
            <a href="#demo" class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-5 rounded-lg transition-colors">Prueba Gratis</a>
            <button class="md:hidden text-secondary focus:outline-none z-50" id="menu-toggle">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
</header>

<!-- Mobile menu backdrop -->
<div class="menu-backdrop fixed inset-0 bg-dark/50 backdrop-blur-sm z-40" id="menu-backdrop"></div>

<!-- Mobile menu -->
<div class="mobile-menu fixed right-0 w-full md:w-80 bg-white z-[100] shadow-xl flex flex-col">
    <div class="p-6 bg-gradient-primary">
        <div class="flex items-center">
            <div class="bg-white rounded-lg p-2 mr-2">
                <i class="fas fa-cube text-primary text-xl"></i>
            </div>
            <span class="text-xl font-bold text-white">Distrox<span class="text-light">ERP</span></span>
        </div>
    </div>
    <div class="flex-1 overflow-y-auto p-6">
        <nav class="flex flex-col space-y-6">
            <a href="#caracteristicas" class="text-secondary hover:text-primary font-medium transition-colors flex items-center">
                <i class="fas fa-th-large w-8"></i>
                <span>Características</span>
            </a>
            <a href="#beneficios" class="text-secondary hover:text-primary font-medium transition-colors flex items-center">
                <i class="fas fa-chart-line w-8"></i>
                <span>Beneficios</span>
            </a>
            <a href="#precios" class="text-secondary hover:text-primary font-medium transition-colors flex items-center">
                <i class="fas fa-tags w-8"></i>
                <span>Precios</span>
            </a>
            <a href="#testimonios" class="text-secondary hover:text-primary font-medium transition-colors flex items-center">
                <i class="fas fa-quote-right w-8"></i>
                <span>Testimonios</span>
            </a>
            <a href="#contacto" class="text-secondary hover:text-primary font-medium transition-colors flex items-center">
                <i class="fas fa-envelope w-8"></i>
                <span>Contacto</span>
            </a>
        </nav>

        <div class="mt-10 pt-10 border-t border-gray-100">
            <a href="#demo" class="bg-primary hover:bg-primary/90 text-white font-medium py-3 px-6 rounded-lg transition-colors w-full flex items-center justify-center">
                <i class="fas fa-rocket mr-2"></i>
                <span>Prueba Gratis</span>
            </a>
        </div>
    </div>
    <div class="p-6 border-t border-gray-100">
        <div class="flex space-x-4">
            <a href="#" class="bg-gray-100 hover:bg-gray-200 text-secondary w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="bg-gray-100 hover:bg-gray-200 text-secondary w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="bg-gray-100 hover:bg-gray-200 text-secondary w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#" class="bg-gray-100 hover:bg-gray-200 text-secondary w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
</div>
