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
                        <td class="px-4 py-1 text-center border-b
                        @if ( $userData['data'][$date]>=1)
                        fill-green-500
                        @else
                        fill-red-500

                        @endif
                        border-gray-300">
                        @if ( $userData['data'][$date] >=1)
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                        @else
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>

                        @endif



                        </td>
                    @endforeach
                </tr>

            @endforeach

        </tbody>
    </table>
</div>
