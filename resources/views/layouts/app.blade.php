<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick and Morty - Alexander Gallardo</title>

    <!-- Mis CSS -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/styles.css">

    <!-- bootstrap - css datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- jquery - bootstrap - datatable-->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

    <script src="/js/app.js"></script>

    <style>
        .header-bar {
            padding: 10px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            align-items: center;
        }

        .back-button {
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        .content {
            padding: 20px;
        }

        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu li {
            display: inline;
            margin-right: 20px;
        }

        .menu li a {
            text-decoration: none;
        }
    </style>
</head>

<body>
<div class="header-bar">
    <button onclick="history.back()" class="back-button">
        ← Back
    </button>
    <ul class="menu">
        <li><a href="{{ route('characters.index') }}">Characters</a></li>
    </ul>
</div>

<div class="content">
    @yield('content')
</div>

<script type="text/javascript" src="{{ asset('js/filter.js') }}"></script>

</body>
</html>
