@guest
    <!-- Guest Links -->
    <a class="text-white text-sm uppercase font-bold p-3 {{ Request::is('/') ? 'bg-green-500' : '' }}" href="{{ route('home') }}">Inicio</a>
@else
    <!-- User Links -->
    <a class="text-white text-sm uppercase font-bold p-3 {{ Request::is('/') ? 'bg-green-500' : '' }}" href="{{ route('home') }}">Inicio</a>
    <a class="text-white text-sm uppercase font-bold p-3 {{ Request::is('polls') ? 'bg-green-500' : '' }}" href="{{ route('polls.index') }}">Ver Votaciones</a>
    <a class="text-white text-sm uppercase font-bold p-3 {{ Request::is('perfil') ? 'bg-green-500' : '' }}" href="{{ route('polls.index') }}">Ver Perfil</a>
    <!-- Admin Links -->
    @if(auth()->user()->role == 'admin')
        <a class="text-white text-sm uppercase font-bold p-3 {{ Request::is('polls/create') ? 'bg-green-500' : '' }}" href="{{ route('polls.create') }}">Nueva Votacion</a>
        <a class="text-white text-sm uppercase font-bold p-3 {{ Request::is('admin/polls') ? 'bg-green-500' : '' }}" href="{{ route('adminPoll.index') }}">Administrar Votaciones</a>
        <a class="text-white text-sm uppercase font-bold p-3 {{ Request::is('admin/users') ? 'bg-green-500' : '' }}" href="{{ route('adminUser.index') }}">Administrar Usuarios</a>
    @endif
@endguest
    

