<table class="table table-bordered">
    <tr>
        <th style="width: 10px">TT</th>
        <th>Tên</th>
        <th>Số điện thoại</th>
        <th>Mail</th>
        <th>Nội dung</th>
        <th>Ghi chú của nhân viên</th>
        <th>Hành động</th>
    </tr>
    @foreach($contact as $key => $item)
        <tr class="item-{{ $item->id }}">
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ substr($item->content,0,30) }}</td>
            <td><input class="ghichu-{{ $item->id }}" id="ghichu-{{ $item->id }}"
                       name="ghichu-{{ $item->id }}" type="text" value="{{ $item->note }}"></td>
            <td width="100px" >
                                        <span data-id="{{ $item->id }}" title="Lưu ghi chú"
                                              class="btn btn-flat btn-primary saveItem"><i class="fa fa-save"></i></span>
            </td>
        </tr>
    @endforeach
</table>

