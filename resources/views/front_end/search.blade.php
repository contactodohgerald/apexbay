<div class="row page-titles">
    <div class="form-group center-search">
        <form action="{{ route('search-query') }}" method="POST">
            @csrf
            <div class="input-group mb-3 custom-search-height">
                {{-- <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="ti-search"></i></span>
                </div> --}}
                <input type="text" class="form-control custom-search-height inputed_query" placeholder="I am looking for... search text here" required name="search_records">
                <div class="input-group-append">
                    <button class="input-group-text" type="submit"><i class="ti-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>        

