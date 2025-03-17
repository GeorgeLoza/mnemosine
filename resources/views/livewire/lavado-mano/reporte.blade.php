<div class="overflow-x-auto">
    <button class=" cursor-pointer " wire:click="pdf" wire:loading.attr="disabled">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-red-500">
            <path
                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
        </svg>
    </button>
    <table class="min-w-full bg-white border border-gray-300 text-xs text-gray-700">
        <thead>
            <tr>
                <th class="px-4 py-1 text-left border-b border-gray-300">Codigo</th>
                <th class="px-4 py-1 text-left border-b border-gray-300">Usuario</th>
                @foreach ($dates as $date)
                    <th class="px-4 py-1 text-center border-b border-gray-300">
                        {{ \Carbon\Carbon::parse($date)->format('d/m') }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $userData)
                <tr>
                    <td class="px-4 py-1 border-b border-gray-300">{{ $userData['user']->codigo }} </td>
                    <td class="px-4 py-1 border-b border-gray-300">{{ $userData['user']->lastname }}
                        {{ $userData['user']->name }} </td>
                    @foreach ($dates as $date)
                        <td
                            class="px-4 py-1 text-center border-b font-bold
                        @if ($userData['data'][$date] >= 1) text-green-500
                        @else
                        text-red-500 @endif
                        border-gray-300">
                            @if ($userData['data'][$date] >= 1)
                                <span class="text-green-500">✔️</span>
                            @else
                                <span class="text-red-500">❌</span>
                            @endif
                            {{ $userData['data'][$date] ?? 0 }}

                        </td>
                    @endforeach
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
