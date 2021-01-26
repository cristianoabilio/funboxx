<div>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">Código</th>
            <th class="px-4 py-2">Valor</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tickets as $ticket)
            <tr @if($loop->even)class="bg-blue-100"@endif>
                <td class="border px-4 py-2">{{ ($ticket->code) }}</td>
                <td class="border px-4 py-2"><small>R$</small> {{ money_mask($ticket->value)}}</td>              
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
