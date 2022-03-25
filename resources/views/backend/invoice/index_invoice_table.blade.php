@foreach ($invoice as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->receiver }}</td>
        <td>{{ $item->address }}</td>
        <td>{{ $item->total_payment }}</td>
        <td>{{ changeStatus($item->status_order)}}</td>
        <td>{{ $item->created_at }}</td>
        <td>
            <div class='btn-group'>
                @if($item->status_order == 1 )
                <button onclick="handleUpdate({{ $item->id }},2)" class="btn btn-primary btn-xs ">DUYỆT </button>
                <button onclick="handleUpdate({{ $item->id }},0)" class="btn btn-danger btn-xs ">HUỶ</button>
                @endif
            </div>
        </td>
        <td> <a href="/admin/invoice/detail/{{ $item->id }}">Chi tiết</a></td>
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