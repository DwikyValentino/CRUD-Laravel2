{{-- @extends('persediaanbarang') --}}
{{-- @include('persediaanbarang') --}}

<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>

        <li class="nav-title">MANAJEMEN PERSEDIAAN BARANG</li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('persediaanbarang.index')}}">
                <i class="nav-icon icon-drop">PersediaanBarang</i>
            </a>
        </li>
        <!-- <li class="nav-item nav-dropdown">
            <a class="">
                        <i class="nav-icon icon-puzzle"></i> Gudang
                    </a>
                </li>
            </ul>
        </li> -->
    </ul>
</nav>
