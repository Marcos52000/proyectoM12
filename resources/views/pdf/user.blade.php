<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    
    <body>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width:30px">Id</th>
                    <th class="w-50">User</th>
                    <th class="w-50">Password</th>
                    <th class="w-50">Email</th>
                    <th class="w-25">Estat</th>
                    <th class="w-50">Created_at</th>
                    <th class="w-50">Updated_at</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($user as $data)
                <tr>
                    <td>
                        {{$data->id}}
                    </td>
                    <td>
                        {{$data->user}}
                    </td>
                    <td>
                        {{ substr($data->password, 0,  20) }}
                    </td>
                    <td>
                        {{$data->email}}
                    </td>
                    <td>
                        {{$data->estat}}
                    </td>
                    <td>
                        {{$data->created_at}}
                    </td>
                    <td>
                        {{$data->updated_at}}
                    </td>
                </tr>
            @endforeach 
            </tbody>
        </table>     
       
    </body>
</html>
