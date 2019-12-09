@section('html-body')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

@yield('js-includes')
<script src="/js/main.js"></script>
@yield('beforebodyend')
@endsection

@section('document')
<!DOCTYPE html>
<html>
@yield('html-body')
</body>
</html>
@show