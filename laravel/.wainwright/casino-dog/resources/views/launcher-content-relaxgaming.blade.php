@if(!isset($_GET['jurisdiction']))
    @php
        $url = "g?".$_SERVER['QUERY_STRING'].'&jurisdiction=MT&channel=web&partnerid=1&apex=0&lang=en_US&moneymode=fun&gameurl=&gameid='.$game_content['origin_gameid'];
        header("HTTP/1.1 301 Moved Permanently");
        header('Location: '.$url);
        die();
    @endphp

@else
<base href="{{ $game_content['base_href'] }}">
{!! $game_content['html'] !!}
@endif