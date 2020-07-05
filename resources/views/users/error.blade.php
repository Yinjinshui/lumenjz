
@if (isset($errors) && count($errors)>0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>错误提示</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $k => $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif