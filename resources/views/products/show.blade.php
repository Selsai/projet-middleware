<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Produit : {{ $product->name }}</h3>
                    <p>Prix : {{ $product->price }} €</p>
                    <p>Statut : {{ $product->is_public ? 'Public' : 'Privé' }}</p>
                    <p>Propriétaire : {{ $product->user->name ?? 'N/A' }}</p>

                    <div class="mt-6 space-x-2">
                        {{-- BOUTON RETOUR --}}
                        <a href="{{ route('products.index') }}" class="text-blue-600 underline">
                            ← Retour à la liste
                        </a>

                        {{-- LIENS CONDITIONNELS --}}
                        @can('manage-product', $product)
                            <a href="{{ route('products.edit', $product) }}" class="text-green-600 underline">
                                Modifier
                            </a>

                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 underline ml-2"
                                    onclick="return confirm('Supprimer définitivement ce produit ?')">
                                    Supprimer
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
