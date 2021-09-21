<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invite Codes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @foreach($inviteCodes as $code)
                    <div>
                        @if ($code->approved())
                            {{ $code->code }}
                            {{ $code->quantity_used }}/{{ $code->quantity }} uses
                        @else
                        (Pending) requested {{ \Carbon\Carbon::parse($code->created_at)->format('Y-m-d') }}
                        @endif

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
