<div class="col-12 col-md-3 sidebar teamps-sidebar-open">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- SideBar Start -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    {{-- @foreach($photos as $p)
                        @if($p->img_type == "logo")
                            <img src="{{ asset('storage/backend/logo/'.$p->photo) }}" width="100px" alt="">
                        @endif
                    @endforeach --}}
                </div>
                <div class="info" style="font-size: 14px; color: #fff; font-weight: bold;">
                    Tech Soft Coding Test
                </div>
            </div>

            <!-- Sidebar Menu Start-->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item has-treeview">
                        <x-menu-title title="Employees" class="fa fa-fw fa-tachometer" link="{{ route('employees.index') }}"></x-menu-title>
                    </li>

                </ul>
            </nav>
            <!-- Sidebar Menu End  -->

        </div>
        <!-- SideBar End -->
    </aside>
</div>
