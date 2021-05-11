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
                    <th class="w-25">Categoria_id</th>
                    <th class="w-25">Compte_id</th>
                    <th class="w-25">Curs_id</th>
                    <th class="w-25">Nivell</th>
                    <th class="w-50">Titol</th>
                    <th class="w-50">Descripcio</th>
                    <th class="w-25">Preu</th>
                    <th class="w-50">Data_inici</th>
                    <th class="w-50">Data_fi</th>
                    <th class="w-25">Estat</th>
                    <th class="w-50">Create_user_id</th>
                    <th class="w-50">Edit_user_id</th>
                    <th class="w-50">Created_at</th>
                    <th class="w-50">Updated_at</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($pagaments as $data)
                <tr>
                    <td>
                        {{$data->id}}
                    </td>
                    <td>
                        {{$data->categoria_id}}
                    </td>
                    <td>
                        {{$data->compte_id}}
                    </td>
                    <td>
                        {{$data->curs_id}}
                    </td>
                    <td>
                        {{$data->nivell}}
                    </td>
                    <td>
                        {{$data->titol}}
                    </td>
                    <td>
                        {{ substr($data->descripcio, 0,  20) }}
                    </td>
                    <td>
                        {{$data->preu}}
                    </td>
                    <td>
                        {{$data->data_inici}}
                    </td>
                    <td>
                        {{$data->data_fi}}
                    </td>
                    <td>
                        {{$data->estat}}
                    </td>
                    <td>
                        {{$data->create_user_id}}
                    </td>
                    <td>
                        {{$data->edit_user_id}}
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
