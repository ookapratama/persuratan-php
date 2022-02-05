<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>

    @if(auth()->user()->level_id == 3 or auth()->user()->level_id == 4 or auth()->user()->level_id == 2 or auth()->user()->level_id == 1)
        @if(auth()->user()->level_id == 4 or auth()->user()->level_id == 3)
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Kelola Surat</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('disposisi') ? 'active' : '' }}"><a href="/disposisi"><i class="fa  fa-share"></i> Disposisi</a></li>
                    <li class="{{ request()->is('surat') ? 'active' : '' }}"><a href="/surat"><i class="fa fa-reply"></i> Surat Keluar</a></li>
                </ul>
            </li>
        @endif

        @if(auth()->user()->level_id == 3 or auth()->user()->level_id == 4 or auth()->user()->level_id == 2 or auth()->user()->level_id == 1)
            <li class="{{ request()->is('antar') ? 'active' : '' }}"><a href="/antar"><i class="fa fa-send"></i> <span>Pengantaran Surat</span></a></li>
        @endif

        @if(auth()->user()->level_id == 4 or auth()->user()->level_id == 3 or auth()->user()->level_id == 2)
            <li class="{{ request()->is('setuju') ? 'active' : '' }}"><a href="/setuju"><i class="fa fa-hourglass-start"></i> <span>Persetujuan</span></a></li>
            <li class="{{ request()->is('setujuAdmin') ? 'active' : '' }}"><a href="/setujuAdmin"><i class="fa fa-check-square-o"></i> <span>Surat Disetujui</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i> <span>Arsip</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('arsip_masuk') ? 'active' : '' }}"><a href="{{ route('arsip_masuk') }}"><i class="fa  fa-sign-in"></i> Surat Masuk</a></li>
                    <li class="{{ request()->is('arsip_keluar') ? 'active' : '' }}"><a href="{{ route('arsip_keluar') }}"><i class="fa fa-sign-out"></i> Surat Keluar</a></li>
                </ul>
            </li>
        @endif

        @if(auth()->user()->level_id == 3)
            <li class="{{ request()->is('user') ? 'active' : '' }}"><a href="/user"><i class="fa fa-users"></i> <span>Kelola User</span></a></li>
        @endif

        @if(auth()->user()->level_id == 3)
            <li class="{{ request()->is('user') ? 'active' : '' }}"><a href="/generate-pdf"><i class="fa fa-users"></i> <span>Tess PDF</span></a></li>
        @endif
    @endif 

</ul>
