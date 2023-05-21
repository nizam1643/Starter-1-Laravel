<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ ucfirst(Request::segment(1)) }} {{ Request::segment(2) ? '- ' . ucfirst(Request::segment(2)) : '' }} Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{ ucfirst(Request::segment(1)) }}</a></li>
                    <li class="breadcrumb-item active">{{ Request::segment(2) ? ucfirst(Request::segment(2)) : '' }} Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>