<div class="row">
    <div class="col-12 col-lg-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employees</a></li>
                {{ $slot }}
            </ol>
        </nav>
    </div>
</div>
