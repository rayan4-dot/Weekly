<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 border border-transparent rounded-xl font-bold text-base text-white uppercase tracking-widest shadow-md hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition']) }}>
    {{ $slot }}
</button>
