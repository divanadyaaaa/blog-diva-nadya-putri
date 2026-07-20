@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-200 rounded-xl shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-100 focus:ring-opacity-50 transition']) }}>