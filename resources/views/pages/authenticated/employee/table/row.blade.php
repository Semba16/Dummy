@php
  $space = '';
  for ($i = 0; $i < $depth; $i++) {
      $space .= '&nbsp;&nbsp;';
  }
@endphp

@foreach ($accounts as $account)
  @if ($depth == 0)
    <tr @class(['bg-default'])>
      <td colspan="2">
        <div @class(['fw-bold'])>
          {{ $account->name }}
        </div>
        <div>
          {{ $account->description }}
        </div>
      </td>
      <td colspan="2">
        {{ Str::upper($account->type) }}
      </td>
    </tr>
  @else
    <tr @class(['fw-bold' => $depth <= 1])>
      <td>{!! $space !!} {{ $account->name }}</td>
      <td>{{ $account->description }}</td>
      <td>{{ $code }}{{ $account->code }}</td>

    </tr>
  @endif


  @include('pages.authenticated.employee.table.row', [
      'accounts' => $account->childs,
      'depth' => $depth + 1,
      'code' => $code . $account->code,
  ])
@endforeach
