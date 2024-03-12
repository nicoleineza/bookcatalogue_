<?php
include 'settings/connection.php';
$bookID = isset($_GET['bookID']) ? $_GET['bookID'] : die('Error: Book ID not specified.');
$userID = 1;

// Prepare a SQL query to fetch the book details
$query = "SELECT Cover, Author, Title, ISBN, PublicationDate, `Description` FROM books WHERE BookID = ?";

if ($stmt = $db->prepare($query)) {
    $stmt->bind_param("i", $bookID);

    $stmt->execute();

    // Bind the result variables
    $stmt->bind_result($cover, $author, $title, $isbn, $publicationDate, $description);
    $stmt->fetch();
    $stmt->close();
}
// Fetch the CategoryID for the book and user
$query = "SELECT CategoryID FROM bookcategories WHERE UserID = ? AND BookID = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("ii", $userID, $bookID);
$stmt->execute();
$result = $stmt->get_result();
$shelfCategoryID = $result->fetch_assoc()['CategoryID'] ?? 'None'; // Default to 'None' if no category is set
$stmt->close();

// Define the status categories
$status = [
    'read' => "1",
    'wantToRead' => "2",
    'currentlyReading' => "3",
    'None' => "None"
];

// Function to check if the radio button should be checked
function isChecked($shelfCategoryID, $categoryID)
{
    return $shelfCategoryID == $categoryID ? "checked" : "";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= htmlspecialchars($title) ?> by <?= htmlspecialchars($author) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="css/book_page.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
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
                        <button id="search-btn" class="btn btn-outline-success " type="submit">
                            Search
                        </button>
                    </form>
                </li>
                <li class="nav-item dropdown">
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
                        <svg class="me-auto" width="24" height="24">
                            <!--svg -->
                        </svg>
                        <span class="las la-book"></span> Dashboard
                    </a>
                </li>
                <li>
                    <a href="library.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
                        <svg class="me-auto" width="24" height="24">
                            <!-- svg -->
                        </svg>
                        <span class="las la-book"></span> Book Catalogue
                    </a>
                </li>
                <li>
                    <a href="#" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
                        <svg class="me-auto" width="24" height="24">
                            <!-- svg -->
                        </svg>
                        <span class="las la-book-reader"></span> Reading Goals
                    </a>
                </li>
                <li>
                    <a href="#" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
                        <svg class="me-auto" width="24" height="24">
                            <!-- svg -->
                        </svg>
                        <span class="las la-medal"></span> Competitions
                    </a>
                </li>
                <li>
                    <a href="search.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
                        <svg class="me-auto" width="24" height="24">
                            <!--svg -->
                        </svg>
                        <span class="las la-search"></span> Search
                    </a>
                </li>
                <li>
                    <a href="discover.php" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
                        <svg class="me-auto" width="24" height="24">
                            <!-- svg -->
                        </svg>
                        <span class="las la-compass"></span> Discover
                    </a>
                </li>
                <li>
                    <a href="#" class="list-group-item list-group-item-action align-items-center" id="side-bar-options">
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
    <div class="container custom-container mt-5">
        <div class="row custom-row">
            <div class="col-3">
                <img src="<?= htmlspecialchars($cover) ?>" class="img-fluid" alt="Book Cover">
                <div id="button-group" class="btn-group-vertical mt-4" role="group" aria-label="Reading Status">
                    <input type="radio" class="btn-check" name="readingStatus" id="read" value="1" <?= isChecked($shelfCategoryID, $status['read']) ?>>
                    <label class="btn btn-outline-primary" for="read">Read</label>
                    <input type="radio" class="btn-check" name="readingStatus" id="wantToRead" value="2" <?= isChecked($shelfCategoryID, $status['wantToRead']) ?>>
                    <label class="btn btn-outline-primary" for="wantToRead">Want to Read</label>
                    <input type="radio" class="btn-check" name="readingStatus" id="currentlyReading" value="3" <?= isChecked($shelfCategoryID, $status['currentlyReading']) ?>>
                    <label class="btn btn-outline-primary" for="currentlyReading">Currently Reading</label>
                    <input type="radio" class="btn-check" name="readingStatus" id="None" value="None" <?= $shelfCategoryID === null ? 'checked' : '' ?>>
                    <label class="btn btn-outline-primary" for="None">None</label>
                </div>

                <div class="dropdown mt-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Add to Categories
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><input class="form-check-input" type="checkbox" value="" id="favourites"><label class="form-check-label" for="favourites">Favourites</label></li>
                        <li><input class="form-check-input" type="checkbox" value="" id="summerTrip"><label class="form-check-label" for="summerTrip">For Summer Trip</label></li>
                        <!-- Add more categories as needed -->
                    </ul>
                </div>
                <br>
                <span style="margin-left: 100px;">Rate this book</span>
                <div id="full-stars-example">
                    <div class="rating-group">
                        <input class="rating__input rating__input--none" name="rating" id="rating-none" value="0" type="radio">
                        <label aria-label="No rating" class="rating__label" for="rating-none"><i class="rating__icon rating__icon--none fa fa-ban"></i></label>
                        <label aria-label="1 star" class="rating__label" for="rating-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating" id="rating-1" value="1" type="radio">
                        <label aria-label="2 stars" class="rating__label" for="rating-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating" id="rating-2" value="2" type="radio">
                        <label aria-label="3 stars" class="rating__label" for="rating-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating" id="rating-3" value="3" type="radio" checked>
                        <label aria-label="4 stars" class="rating__label" for="rating-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating" id="rating-4" value="4" type="radio">
                        <label aria-label="5 stars" class="rating__label" for="rating-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating" id="rating-5" value="5" type="radio">
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <h2><?= htmlspecialchars($title) ?></h2>
                <p><?= htmlspecialchars($author) ?></p>

                <p><?= htmlspecialchars($description) ?></p>
                <span>First published on <?= htmlspecialchars($publicationDate) ?></span> <br>
                <span>ISBN <?= htmlspecialchars($isbn) ?> </span>
                <hr>
                <h3>Write a Review</h3>
                <textarea id="reviewText" class="form-control" rows="5" maxlength="4000" placeholder="Write your review here..."></textarea>
                <button id="submitReview" class="btn btn-primary mt-3">Submit Review</button>
                <hr>
                <h3>Reviews</h3>
                <div id="reviews">
                    <div class="media mt-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReHlx51nzRyT2IGzXt9Ow0uUOOTCEAXlPejZhQLm1aAw&s" class="mr-3 rounded-circle" alt="Profile Photo" style="width: 40px; height: 40px;">
                        <div class="media-body">
                            <h5 class="mt-0">User Name</h5>
                            <div class="rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p>User's review goes here...</p>
                            <small class="text-muted">Posted on January 1, 2020</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    //allows dropdown to remain active after clicking an option
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
    var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl, {
            autoClose: 'outside' // or 'inside', or false
        })
    })


    $(document).ready(function() {
        $('input[type=radio][name=readingStatus]').change(function() {
            var status = this.value;
            var bookID = <?= $bookID ?>; // Make sure this variable is set to the current book's ID
            $.ajax({
                url: 'actions/update_status.php', // The server-side script to handle the update
                type: 'POST',
                data: {
                    'status': status,
                    'bookID': bookID
                },
                success: function(response) {
                    //alert('Status updated successfully.');
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    alert('An error occurred: ' + error);
                }
            });
        });
    });
</script>