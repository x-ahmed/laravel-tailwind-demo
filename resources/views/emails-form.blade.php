<x-guest-layout>
    <x-jet-banner/>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h2 class="text-4xl font-extrabold text-gray-900">Bulk Emails To Users</h2>
        </x-slot>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST"
            action="{{ route('emails.send') }}">
            @csrf

            <div class="py-1">
                <x-jet-label for="title"
                    value="{{ __('Title') }}" />
                <x-jet-input id="title"
                    class="block w-full mt-1"
                    type="text"
                    name="title"
                    :value="old('title')"
                    required
                    autofocus />
                <x-jet-input-error for="title"
                    class="mt-2" />
            </div>

            <div class="py-1">
                <x-jet-label for="body"
                    value="{{ __('Body') }}" />
                <textarea name="body" id="body"
                    required
                    autofocus
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('body', request('body')) }}</textarea>
                <x-jet-input-error for="body"
                    class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Send Bulk') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
