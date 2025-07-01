<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-100 to-gray-200 border border-gray-300 rounded-xl font-bold text-base text-gray-700 uppercase tracking-widest shadow-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
