
Dear {{$data['name']}},<br/>
&emsp;{{$data['message']}}
<br/>
{{ (isset($data['nextService'])?'Your Next Servicing Date is':'') }}
{{ (isset($data['nextService'])?$data['nextService']:'') }}
<br>
Thanks,<br>

{{ config('app.name') }}

