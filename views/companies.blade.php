<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style type="text/css">
        .curr {
            text-align: right;
        }
    </style>
</head>

<body>
<div class="container mb-3" id="content" tabindex="-1">

    <div class="row">

        <div class="card mt-3">

            <div class="card-header">

                <h1>Kompanijų sąrašas <a class="btn btn-warning float-end" href="createCompany.php">Sukurti naują įmonę</a></h1>
            </div>
            <div class="card-body">
                <div class="col-md-12 d-flex flex-row">
                    <table class="table">
                        <thead>
                        <tr class="table-warning text-center">
                            <th>Pavadinimas</th>
                            <th>Adresas</th>
                            <th>VAT code</th>
                            <th>Pilnas pavadinimas</th>
                            <th>Telefonas</th>
                            <th>El. Paštas</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        @foreach($companies as $company)
                            <tbody>
                        <tr class="table-light text-center">
                            <td>{{$company->name}}</td>
                            <td>{{$company->address}}</td>
                            <td>{{$company->vat_code}}</td>
                            <td>{{$company->company_name}}</td>
                            <td>{{$company->phone}}</td>
                            <td>{{$company->email}}</td>
                            <td><a class="btn btn-success" href="updateCompany.php?id={{$company->id}}">Update</a></td>
                            <td><a class="btn btn-danger" href="?deleteCompany_id={{$company->id}}">Delete</a></td>

                        </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>



