<nav>
    <!-- Autres liens -->
    <a href="{{ route('panier.index') }}" class="ml-4">
        Panier
        @php $count = session('panier') ? array_sum(session('panier')) : 0; @endphp
        @if($count > 0)
            <span class="bg-blue-500 text-white rounded-full px-2">{{ $count }}</span>
        @endif
    </a>
</nav> 