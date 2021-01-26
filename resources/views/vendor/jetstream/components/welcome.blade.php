<div class="p-6 sm:px-20 bg-white border-b border-gray-200">


    <div class="mt-8 text-2xl">
        Olá, {{ Auth::user()->name }}
    </div>

    <div class="mt-6 text-gray-500">
    Lorem ipsum potenti sem ad euismod orci non mattis ad magna primis, tempus etiam est ut donec orci consectetur netus at habitasse. donec vulputate sociosqu et netus nec quam consequat phasellus quisque neque, blandit eros feugiat vitae quisque dui aliquam lectus imperdiet luctus molestie, vulputate aliquam volutpat tellus metus pharetra magna nostra mattis. litora vitae habitant a lobortis varius nibh senectus placerat lacinia, fringilla velit massa ligula pretium aptent eget donec habitant ligula, convallis aenean class orci nulla tempor phasellus porttitor. eu nunc ut maecenas senectus placerat conubia ultrices ut scelerisque, ultricies rutrum mollis leo gravida fusce aliquam luctus, faucibus rhoncus praesent vel ut dolor nullam egestas. 
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Ajude-nos a te conhecer melhor</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Você irá gastar menos de 2 minutos para responder essa pesquisa e com certeza terá uma experiência <strong>Funboxx</strong> ainda melhor.
            </div>

            <a href="https://laravel.com/docs">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>vamos lá!</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <x-heroicon-o-user-circle class="w-8 h-8 text-gray-400"/>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Dados Pessoais</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
            Mantenha seu cadastro atualizado.
            </div>

            <a href="{{ route('profile.show') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>visualizar</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <x-heroicon-o-ticket class="w-8 h-8 text-gray-400"/>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://tailwindcss.com/">Cupom de desconto</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Indique para seus amigxs e deixe que tenham mais prazer por menos R$.
            </div>
            <div class="mt-2 text-sm text-gray-500">
                <livewire:user-tickets />
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <x-heroicon-o-credit-card class="w-8 h-8 text-gray-400"/>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Meus pagamentos</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                <livewire:user-payments />
                
            </div>
        </div>
    </div>
</div>
