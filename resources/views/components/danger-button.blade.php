<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-700 border border-transparent rounded-xl font-bold text-base text-white uppercase tracking-widest shadow-md hover:from-red-600 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition']) }}>
    {{ $slot }}
</button>
