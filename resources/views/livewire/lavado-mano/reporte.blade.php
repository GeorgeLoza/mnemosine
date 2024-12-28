<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 text-xs text-gray-700">
        <thead>
            <tr>
                <th class="px-4 py-1 text-left border-b border-gray-300">Codigo</th>
                <th class="px-4 py-1 text-left border-b border-gray-300">Usuario</th>
                @foreach ($dates as $date)
                    <th class="px-4 py-1 text-center border-b border-gray-300">{{ \Carbon\Carbon::parse($date)->format('d/m') }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $userData)
                <tr>
                    <td class="px-4 py-1 border-b border-gray-300">{{ $userData['user']->codigo }} </td>
                    <td class="px-4 py-1 border-b border-gray-300">{{ $userData['user']->name }} {{ $userData['user']->lastname }} </td>
                    @foreach ($dates as $date)
                        <td class="px-4 py-1 text-center border-b font-bold
                        @if ( $userData['data'][$date] <=4)
                        text-red-500
                        @else
                        text-green-500

                        @endif
                        border-gray-300">
                            {{ $userData['data'][$date] ?? 0 }}

                        </td>
                    @endforeach
                </tr>

            @endforeach

        </tbody>
    </table>
</div>
