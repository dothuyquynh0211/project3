
@foreach ($invoice as $item)
<tr>
    <td class="cart__price">
        <h6> {{ $item->id }}</h6>
    </td>
    <td class="cart__price">
        <h6> {{ $item->receiver }}</h6>
    </td>
    <td class="cart__price">
        <h6> {{ $item->address }}</h6>
    </td>
    <td class="cart__quantity">
        <h6>{{ number_format($item->total_payment, 0, ',', '.') }} đ</h6>
    </td>
    <td class="cart__total">

        <h6>{{ changeStatus($item->status_order) }}</h6>
    </td>
    <td class="cart__total">
        <a href="/history/{{ $item->id }}"> Chi tiết</a>

    </td>
    @if ($item->status_order == 1)
        <td class="cart__close" >
            <button onclick="cancelOrder({{ $item->id }},0)" class="btn btn-danger btn-xs ">HUỶ</button>
            </td>
    @endif
</tr>
@endforeach
<?php 
    function changeStatus($status){
        switch ($status) {
            case 0:
            return 'Đã huỷ';
                break;
            case 1:
            return 'Đang chờ duyệt';
                break;
            case 2:
            return 'Đã duyệt';
                break; 
            default:
                break;
        }
    }
?>