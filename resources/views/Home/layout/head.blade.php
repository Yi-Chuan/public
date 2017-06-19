@foreach($cates as $k=>$v)
<li class="dropdown">  
    <a  role="button" data-toggle="dropdown" class="dropdown-toggle" data-target="#"  
       href="javascript:;">  
        {{$v->title}} <span class="caret"></span>  
    </a>  
    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">  
        @foreach($v->sub as $kk=>$vv)
        <li class="dropdown-submenu">  
            <a tabindex="-1" href="javascript:;">{{$vv->title}}</a>  
            <ul class="dropdown-menu">  
                @foreach($vv->sub as $kkk=>$vvv)
                <li><a tabindex="-1" href="javascript:;">{{$vvv->title}}</a></li>  
                 @endforeach  
            </ul>  
        </li>
        @endforeach  
    </ul>  
</li>  
@endforeach