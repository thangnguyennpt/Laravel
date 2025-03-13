@if (count($list_menu_sub) == 0)
    <li class="nav-item active" id="menu-item">
        <a class="nav-link active" aria-current="page" href="{{ url('/'.$menu->link) }}">{{ $menu->name }}</a>
    </li>
@else
    <li class="nav-item ms-3" >
        <a class="nav-link" href="{{ url('/'.$menu->link) }}"  role="button" data-bs-toggle="" aria-expanded="false">
            {{ $menu->name }}
        </a>
        
    </li>
@endif