<footer class="footer bg-footer" style="margin-left: 0">
    <div class="container">

        <div class="copy-right animated wow slideInUp" data-wow-delay=".2s">
            <p>&copy  {{env('APP_NAME')}} Limited  <?php $d = date('Y'); print @$d; ?> All rights reserved</p>
        </div>
        <div class="copy-right animated wow slideInUp" data-wow-delay=".3s">
            <p><a href="{{ route('pricing') }}">Pricing</a> | <a href="{{ route('about-us') }}">About</a></p>
        </div>
    </div>

</footer>