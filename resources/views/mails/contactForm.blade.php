<!DOCTYPE html>
<html>

<head>
  <title>新聯絡表單提交</title>
</head>

<body>
  <h2>新聯絡表單提交 - {{ $params['type'] }}</h2>
  <p>有新的{{ $params['type'] }}提交了聯絡表單，詳細資訊如下：</p>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th align="left">聯絡人姓名</th>
      <td>{{ $params['name'] ?? '未提供' }}</td>
    </tr>
    <tr>
      <th align="left">聯絡電話</th>
      <td>{{ $params['phone'] ?? '未提供' }}</td>
    </tr>
    <tr>
      <th align="left">電子郵件</th>
      <td>{{ $params['email'] ?? '未提供' }}</td>
    </tr>
    @if($params['type'] == '教師')
    <tr>
      <th align="left">科系</th>
      <td>{{ $params['department'] ?? '未提供' }}</td>
    </tr>
    <tr>
      <th align="left">職稱</th>
      <td>{{ $params['jobTitle'] ?? '未提供' }}</td>
    </tr>
    @else
    <tr>
      <th align="left">公司名稱</th>
      <td>{{ $params['companyName'] ?? '未提供' }}</td>
    </tr>
    <tr>
      <th align="left">職稱</th>
      <td>{{ $params['jobTitle'] ?? '未提供' }}</td>
    </tr>
    @if(isset($params['settings']))
    <tr>
      <th align="left">個人設定</th>
      <td>
        <ul>
          @foreach($params['settings'] as $setting)
          <li>{{ $setting }}</li>
          @endforeach
        </ul>
      </td>
    </tr>
    @endif
    @endif
    <tr>
      <th align="left">留言</th>
      <td>{{ $params['messsage'] ?? '無' }}</td>
    </tr>
    <tr>
      <th align="left">提交時間</th>
      <td>{{ $params['submitTime'] ?? now()->format('Y-m-d H:i:s') }}</td>
    </tr>
  </table>
</body>

</html>