<tbody>
  @if(!empty($datas))
  @foreach($datas as $data)
  <tr>
    @foreach($data->toArray() as $key => $value)
    <td class="text-center">
      {{ $data->toArray()[$key] }}
    </td>
    @endforeach
    <td class="text-center">
      {{ $data->professionsList->profession}}
    </td>
  </tr>
  @endforeach
  @endif
<tbody>