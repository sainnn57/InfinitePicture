<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/galeri.css">
    <link rel="stylesheet" href="/assets/css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>INFINITEPICTURE</title>
    <style>
        nav {
            background: linear-gradient(90deg, rgb(17, 38, 80) 0%, rgb(17, 38, 80) 49%, rgb(17, 38, 80) 100%);
        }

        .gallery-container {
            column-count: 4;
            column-gap: 15px;
            margin: 20px;
        }

        .gallery-item {
            display: inline-block;
            margin-bottom: 15px;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;

        }
    </style>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="/assets/img/logo2.png" alt="" width="45" height="45" class="d-inline-block align-text-top">
            </a>
            <div class="brand" style="color: white;">INFINITEPICTURE</div>
            <ul class="navbar-nav ms-3 me-3 mb-lg-0 inihome">
                <li class="nav-item">
                    <a class="nav-link active" style="color: white;" aria-current="page" href="/home">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto mb-lg-0 inicreate">
                <li class="nav-item">
                    <a class="nav-link active " style="color: white;" href="/create">Create</a>
                </li>
            </ul>
            <ul class="navbar-nav me-3 ms-2 mb-lg-0 inicrt">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="/create"><i class="fa-solid fa-plus fa-lg" style="color: #000000;"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto ms-3 mx-auto mb-lg-0">
                <li class="nav-item">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 inisearch1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success inisearch" type="submit">Search</button>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav ms-3 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/profile">
                        <img src="<?= '/foto_storage/' . $user['foto'] ?>" alt="user" width="45" height="45" class="d-inline-block align-text-top rounded-circle">
                    </a>
                </li>
            </ul>
        </div>  
    </nav>

</head>

<?= $this->renderSection('body') ?>
<script src="https://kit.fontawesome.com/9b5ad81b89.js" crossorigin="anonymous"></script>
</html>