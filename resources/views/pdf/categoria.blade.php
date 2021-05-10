<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    
    <body>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width:30px">Id</th>
                    <th class="w-50">Categoria</th>
                    <th class="w-50">Estat</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($categoria as $data)
                <tr>
                    <td>
                        {{$data->id}}
                    </td>
                    <td>
                        {{$data->categoria}}
                    </td>
                    <td>
                        {{$data->estat}}
                    </td>
                </tr>
            @endforeach 
            </tbody>
        </table>     
       
    </body>
</html>
