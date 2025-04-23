<!-- Contact Section -->
<section id="contacto" class="py-20 md:py-28 bg-light">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16 reveal">
            <div class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary font-medium text-sm mb-4">Contacto</div>
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-secondary">¿Hablamos?</h2>
            <p class="text-gray-600 text-lg">Estamos aquí para responder tus preguntas y ayudarte a encontrar la solución perfecta para tu negocio.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 reveal">
            <div>
                <form class="bg-white rounded-xl p-8 shadow-soft border border-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" id="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Empresa</label>
                        <input type="text" id="company" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                    </div>
                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Asunto</label>
                        <select id="subject" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            <option value="">Selecciona una opción</option>
                            <option value="demo">Solicitar demostración</option>
                            <option value="quote">Solicitar cotización</option>
                            <option value="support">Soporte técnico</option>
                            <option value="other">Otro</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
                        <textarea id="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary transition-colors"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white font-medium py-3 px-6 rounded-lg transition-colors">Enviar Mensaje</button>
                </form>
            </div>
            <div>
                <div class="bg-gradient-dark text-white rounded-xl p-8 shadow-soft h-full relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-20 right-20 w-64 h-64 bg-primary rounded-full filter blur-3xl"></div>
                        <div class="absolute bottom-20 left-20 w-40 h-40 bg-accent rounded-full filter blur-3xl"></div>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold mb-6">Información de Contacto</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-white/10 rounded-lg p-3 mr-4">
                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-white">Dirección</h4>
                                    <p class="text-gray-300">Av. Principal 1234, Ciudad</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-white/10 rounded-lg p-3 mr-4">
                                    <i class="fas fa-phone text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-white">Teléfono</h4>
                                    <p class="text-gray-300">+1 (555) 123-4567</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-white/10 rounded-lg p-3 mr-4">
                                    <i class="fas fa-envelope text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-white">Email</h4>
                                    <p class="text-gray-300">info@distroxerp.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-white/10 rounded-lg p-3 mr-4">
                                    <i class="fas fa-clock text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-white">Horario de Atención</h4>
                                    <p class="text-gray-300">Lunes a Viernes: 9am - 6pm</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="font-medium text-white mb-4">Síguenos</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="bg-white/10 hover:bg-white/20 text-white w-10 h-10 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="bg-white/10 hover:bg-white/20 text-white w-10 h-10 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-white/10 hover:bg-white/20 text-white w-10 h-10 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-white/10 hover:bg-white/20 text-white w-10 h-10 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
