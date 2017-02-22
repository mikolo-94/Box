<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Box List</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>
<body>

<div class="container" style="margin-top: 100px;">

    <div class="row">
        <h3>List of boxes</h3>
    </div>






    <table class="table table-hover" style="margin-top: 30px;">
        <thead>
        <tr>
            <th>Receiver</th>
            <th>Weight</th>
            <th>Box color</th>
            <th>Shipping cost</th>
        </tr>
        </thead>
        <tbody>

        @foreach($boxes as $box)
            <tr>
                <td>{{$box->receiver}}</td>
                <td>{{$box->weight}} Kilograms</td>
                <td style="background:{{$box->box_color}}"></td>
                <td>{{$box->shipping_cost}} SEK</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <p>Total shipping cost: {{$totalCost}}</p>
    <p>Total weight: {{$totalWeight}}</p>
</div>

</body>
</html>