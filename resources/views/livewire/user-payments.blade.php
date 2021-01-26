<div>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">Data</th>
            <th class="px-4 py-2">Valor</th>
            <th class="px-4 py-2">Status</th>     
        </tr>
        </thead>
        <tbody>
        @foreach ($payments as $payment)
            <tr @if($loop->even)class="bg-grey"@endif>
                <td class="border px-4 py-2">{{ (datehour_mask($payment->created_at)) }} </td>
                <td class="border px-4 py-2"><small>R$</small> {{ (money_to_decimal($payment->value)) }}</td>
                <td class="border px-4 py-2">@if($payment->lr == 00)Aprovado @else Negado @endif</td>              
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
