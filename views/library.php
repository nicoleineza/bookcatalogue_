<?php
include '../functions/display_categories.php';
error_reporting(0); //because php throws an error indicating a file path issue
//even though the application is still functional
include '..settings/core.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>My Library</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="../css/library.css" rel="stylesheet">
</head>

<body>
  <?=  $_SESSION['user_id'] ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <button class="btn me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mr-3" href="#">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
      </svg>
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav w-100 d-flex justify-content-center align-items-center">
        <li class="nav-item me-3">
          <form class="d-flex">
            <input id="search-input" class="form-control me-2" type="search" placeholder="Search your library" aria-label="Search" />
          </form>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
              </svg>
            </i>
            Sort by
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Title</a></li>
            <li><a class="dropdown-item" href="#">Author</a></li>
            <li><a class="dropdown-item" href="#">Recent</a></li>
          </ul>
        </li>
      </ul>
      <div class="nav-item ms-3">
        <a class="nav-link" href="#">
          <i>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
            </svg>
          </i>
        </a>
      </div>
    </div>
  </nav>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasSidebarLabel">
        Book Catalogue
      </h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="side-bar">
      <ul class="list-group list-group-flush">
        <li>
          <a href="dashboard.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-1x2" viewBox="0 0 16 16">
              <path d="M6 1H1v14h5zm9 0h-5v5h5zm0 9v5h-5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1z" />
            </svg>

            <span class="las la-book"></span> Dashboard
          </a>
        </li>
        <li>
          <a href="library.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
              <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
            </svg>

            <span class="las la-book"></span> Book Catalogue
          </a>
        </li>
        <li>
          <a href="setgoal.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bullseye" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
              <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
              <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8" />
              <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
            </svg>
            <span class="las la-book-reader"></span> Reading Goals 
          </a>
        </li>
        <li>
          <a href="competitions.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy" viewBox="0 0 16 16">
              <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935M3.504 1q.01.775.056 1.469c.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.5.5 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667q.045-.694.056-1.469z" />
            </svg>
            <span class="las la-medal"></span> Competitions
          </a>
        </li>
        <li>
          <a href="search.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
            <span class="las la-search"></span> Search
          </a>
        </li>
        <li>
          <a href="discover.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
            <span class="las la-compass"></span> Discover
          </a>
        </li>
        <li>
          <a href="profile.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
            <svg class="me-auto" width="24" height="24">
              <!--svg-->
            </svg>
            <span class="las la-user"></span> Profile
          </a>
        </li>
        <li>
          <a href="login.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
            <svg class="me-auto" width="24" height="24">
              <!-- svg -->
            </svg>
            <span class="las la-sign-out-alt"></span> Sign out
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-md-3">
        <h5><svg style="margin-left:12px; margin-right:5px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
          </svg> Library</h5>
        <div id="side-bar" class="list-group">
          <?= display_categories($_SESSION['user_id']); ?>
          <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            Add
            <i style="margin-left: 220px">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="black" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
              </svg>
            </i>
          </a>

        </div>
      </div>
      <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addCategoryModalLabel">Add Category Name</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control" placeholder="Category Name">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Okay</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9" id="book-container">
        <div class="row">
          <?php include "../functions/display_books.php"; ?>
        </div>
      </div>
      <div class="col-md-9" id="searched-container">
        <div class="row">
          <!-- books will be displayed here -->
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $("#addCategoryModal .btn-primary").click(function() {
      var categoryName = $("#addCategoryModal .form-control").val();
      var userID = <?= $_SESSION['user_id'] ?>;

      $.ajax({
        type: "POST",
        url: "../actions/add_category.php",
        data: {
          categoryName: categoryName,
          userID: userID
        },
        success: function(response) {
          //console.log(response);
          location.reload();

        }

      });
    });
    $(document).on('click', '.category', function() {
      var categoryID = $(this).data('category-id');
      var userID = <?= $_SESSION['user_id'] ?>;
      //console.log("catclik");

      // Call the display_books function with the selected categoryID
      $.ajax({
        type: "POST",
        url: "../functions/display_books.php",
        data: {
          userID: userID,
          categoryID: categoryID
        },
        success: function(response) {
          // Update the part of the page that displays the books
          $('#book-container .row').html(response);
        }
      });
    });

    $(document).ready(function() {
      // Event listener for the search input
      $('#search-input').keyup(function() {
        var searchValue = $(this).val();
        var userID = <?= $_SESSION['user_id'] ?>;

        // If the searchValue is not empty, perform the search
        if (searchValue.trim() !== '') {
          // Hide the initial books container
          $('#book-container').hide();

          $.ajax({
            type: "POST",
            url: "../functions/search_books.php",
            data: {
              search: searchValue,
              userID: userID
            },
            success: function(response) {
              // Show the searched books container and update its content
              $('#searched-container').show();
              $('#searched-container .row').html(response);
            }
          });
        } else {
          // If the searchValue is empty, show the initial books container
          $('#searched-container').hide();
          $('#book-container').show();
        }
      });
    });
  </script>





</body>

</html>