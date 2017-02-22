<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create box</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    <!-- Colorpicker, sparas i public/dist -->
    <link href="/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="/dist/js/bootstrap-colorpicker.js"></script>



</head>
<body>

<div class="container" style="margin-top: 100px;">

    <div class="row">
        <h3>Add box</h3>
    </div>



    <div class="col-xs-3">
        <form action="{{route('box.store')}}" method="post" class="form" style="margin-top: 15px; margin-bottom: 15px;">


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="text" class="form-control" name="weight" id="weight" value="0" aria-describedby="weightHelp">
            </div>



            <div class="form-group">
                <label for="rgb">Box Color (All shades of blue are forbidden)</label>

                <div id="rgb" class="input-group colorpicker-component">
                    <input type="text" name="boxColor" id="rgb" class="form-control" aria-describedby="rgbHelp" data-format="rgb" placeholder="click to show colorpicker, no blue shade is allowed">

                    <span class="input-group-addon"><i></i></span>
                </div>
                <script>
                    $(function () {
                        $('#rgb').colorpicker({
                            color: '#AA3399',
                            format: 'rgb'
                        });
                    });
                </script>
            </div>




            <div class="form-group">
                <label for="destination">Destination Country</label>
                <select class="form-control" name="destination" id="destination">
                    <option>Sweden</option>
                    <option>China</option>
                    <option>Brazil</option>
                    <option>Australia</option>
                </select>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button type="submit" class="btn btn-success">Save</button>
        </form>

    <!-- Skriver ut error om de finns -->
    @if (count($errors) > 0)
        <p class="alert alert-danger"> @foreach ($errors->all() as $error){{ $error }}<br>
            @endforeach
        </p>
    @endif
    </div>
    </div>
</body>
</html>