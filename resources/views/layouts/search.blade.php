<!-- search form -->
<form action="{{$route}}" method="get" id="admin-search">
    <div class="row d-flex justify-content-start">
        <div class="col-6 col-md-4 col-lg-5">
            <label for="q">Buscar </label>
            <input type="text" name="q" class="form-control form-control-sm" placeholder=" Buscar..."
                value="{!! request()->input('q') !!}">
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <label for="from">Desde</label>
            <input type="date" name="from" class="form-control form-control-sm "
                value="{!! request()->input('from') !!}">
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <label for="to">Hasta</label>
            <input type="date" name="to" class="form-control form-control-sm " value="{!! request()->input('to') !!}">
        </div>

        <div class="col-12">
            <div class="col-12 d-flex ">
                <span class="input-group-btn ml-auto btn-pr">
                    <button type="submit" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                        Buscar
                    </button>
                </span>
            </div>
        </div>
    </div>
</form>