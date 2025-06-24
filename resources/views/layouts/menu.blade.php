<nav class="bg-gray-800 p-4 text-white flex items-center justify-between" style="background-color: #171924;">
    <div class="flex space-x-4">
        <a href="{{ route('usuarios.create') }}" class="hover:underline">
            Cadastrar Usuário
        </a>

        @auth
            <a href="{{ route('usuarios.edit', auth()->user()) }}" class="hover:underline">
                Editar Perfil
            </a>
            <a href="{{ route('clientes.index', auth()->user()) }}" class="hover:underline">
                Clientes
            </a>
        @endauth
    </div>
    <div>
        @auth
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="hover:underline">Login</a>
        @endauth
    </div>
</nav>