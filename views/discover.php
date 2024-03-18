<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="../css/library.css" rel="stylesheet">

    <title>Discover Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            // Include your database connection file here
            include '../settings/connection.php';

            $sql = "SELECT * FROM books";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-3">
                            <a id="book-link" href="../views/book_page.php?bookID=' . $row['BookID'] . '">
                                <div class="card">
                                    <img src="' . htmlspecialchars($row['Cover']) . '" class="card-img-top" alt="Book Image" />
                                    <div class="card-body">
                                        <h5 class="card-title">' . htmlspecialchars($row['Title']) . '</h5>
                                        <p class="card-text">' . htmlspecialchars($row['Author']) . '</p>
                                    </div>
                                </div>
                            </a>    
                        </div>';
                }
            } else {
                echo "No results";
            }
            $connection->close();
            ?>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>

</html>