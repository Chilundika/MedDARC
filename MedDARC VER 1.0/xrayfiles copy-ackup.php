<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X-Ray Files</title>
    <link rel="stylesheet" type="text/css" href="css/files.css">

    <style>
        header {
            background-color: #333;
            color: white;
            padding: 15px 8px; /* Reduced padding */
            text-align: center;
            width: 100%;
            box-shadow: 0 2px 1px rgba(0, 0, 0, 0.1);
            font-size: 18px; /* Adjust font size if needed */
            display: flex;
            align-items: center;
        }

        .navigation-bar ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navigation-bar li {
            margin-left: 20px;
        }

        .navigation-bar a {
            color: aliceblue;
            text-decoration: none;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        .preview {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<header>
    <img src="Resource/logo.png" alt="logo" width="50px" height="50px">
    <h1 style="margin-left: 10px; font-size: 20px;">MedDARC</h1>
    <div class="navigation-bar" style="margin-left: auto;">
        <nav>
            <ul>
                <li><a href='xrayfiles.php'>Refresh</a></li>
                <li><a href='index.php'>Exit</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <h1 style="color:black; text-align:center;">DATA ARCHIVE</h1>
    <hr>
    <section style="text-align: center;">
        <h1>Upload and Download Files</h1>
        <hr>
        <p style="text-align: center;color:black;">Max file uploads = 20 mbs, no more than that!</p>

        <!-- File Upload Form -->
        <form action="xrayfiles.php" method="post" enctype="multipart/form-data">
            <label for="file">Choose file to upload (Max size: 20MB):</label>
            <input type="file" name="file" id="file" required>
            <input type="submit" name="upload" value="Upload">
        </form>
    </section>
    <hr>

    <!-- Search Box -->
    <section style="text-align: center;">
        <form action="xrayfiles.php" method="get">
            <input type="text" name="search" placeholder="Search files" required>
            <input type="submit" value="Search">
        </form>
    </section>
    <hr>

    <!-- List of Files for Download and Delete -->
    <h2 style="text-align: center;">Available Files</h2>
    <p style="text-align: center;color:red;">NOTE..!</p>
    <hr>
    <p style="text-align: center;color:black;">Max file downloads = 2 files at a goal!</p>
    <hr>
    <p style="text-align: center;color:black;">To download: please tick a checkbox against the file and proceed to download</p>
    <hr>
    <p style="text-align: center;color:black;">To delete: please tick a checkbox against the file and proceed to delete</p>
    <hr>
    <form action="xrayfiles.php" method="post" id="fileForm">
        <table>
            <tr>
                <th>Preview</th>
                <th>Filename</th>
                <th>Download</th>
                <th>Delete</th>
            </tr>
            <?php
            // Include database connection
            $db_server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "test_project";

            $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Ensure the uploads directory exists
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Handle file upload
            if (isset($_POST['upload'])) {
                $uploadFile = $uploadDir . basename($_FILES['file']['name']);

                if ($_FILES['file']['size'] > 20971520) { // 20MB in bytes
                    echo "<script>alert('File is too large.');</script>";
                } elseif (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                    $filename = $_FILES['file']['name'];
                    $filepath = $uploadFile;

                    $stmt = $conn->prepare("INSERT INTO files (filename, filepath) VALUES (?, ?)");
                    if ($stmt) {
                        $stmt->bind_param("ss", $filename, $filepath);
                        $stmt->execute();
                        $stmt->close();
                        echo "<script>alert('File uploaded successfully.');</script>";
                    } else {
                        echo "<script>alert('Database error: " . $conn->error . "');</script>";
                    }
                } else {
                    echo "<script>alert('File upload failed. Please check the directory permissions.');</script>";
                }
            }

            // Handle file download
            if (isset($_POST['download'])) {
                $fileIds = $_POST['files'];
                if (count($fileIds) > 2) {
                    echo "<script>alert('You can download a maximum of 2 files at a time.');</script>";
                } else {
                    $fileNotExist = false;
                    foreach ($fileIds as $fileId) {
                        $stmt = $conn->prepare("SELECT filepath FROM files WHERE id = ?");
                        if ($stmt) {
                            $stmt->bind_param("i", $fileId);
                            $stmt->execute();
                            $stmt->bind_result($filepath);
                            $stmt->fetch();
                            $stmt->close();

                            if (file_exists($filepath)) {
                                header('Content-Description: File Transfer');
                                header('Content-Type: application/octet-stream');
                                header('Content-Disposition: attachment; filename=' . basename($filepath));
                                header('Expires: 0');
                                header('Cache-Control: must-revalidate');
                                header('Pragma: public');
                                header('Content-Length: ' . filesize($filepath));
                                flush(); // Flush system output buffer
                                readfile($filepath);
                            } else {
                                $fileNotExist = true;
                            }
                        } else {
                            echo "<script>alert('Database error: " . $conn->error . "');</script>";
                        }
                    }
                    if ($fileNotExist) {
                        echo "<script>alert('File does not exist.');</script>";
                    }
                }
            }

            // Handle file delete
            if (isset($_POST['delete'])) {
                $fileIds = $_POST['files'];
                foreach ($fileIds as $fileId) {
                    $stmt = $conn->prepare("SELECT filepath FROM files WHERE id = ?");
                    if ($stmt) {
                        $stmt->bind_param("i", $fileId);
                        $stmt->execute();
                        $stmt->bind_result($filepath);
                        $stmt->fetch();
                        $stmt->close();

                        if (file_exists($filepath)) {
                            unlink($filepath); // Delete file from server
                        }

                        // Delete file record from database
                        $stmt = $conn->prepare("DELETE FROM files WHERE id = ?");
                        if ($stmt) {
                            $stmt->bind_param("i", $fileId);
                            $stmt->execute();
                            $stmt->close();
                        }
                    } else {
                        echo "<script>alert('Database error: " . $conn->error . "');</script>";
                    }
                }
                echo "<script>alert('Selected files have been deleted.');</script>";
            }

            // List available files with optional search functionality
            $searchQuery = "";
            if (isset($_GET['search'])) {
                $searchTerm = $_GET['search'];
                $searchQuery = "WHERE filename LIKE '%" . $conn->real_escape_string($searchTerm) . "%'";
            }

            $result = $conn->query("SELECT id, filename, filepath FROM files $searchQuery");
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>';
                $fileExtension = pathinfo($row['filename'], PATHINFO_EXTENSION);
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo '<img src="' . $row['filepath'] . '" class="preview" alt="Preview">';
                } elseif ($fileExtension == 'pdf') {
                    echo '<embed src="' . $row['filepath'] . '" class="preview" type="application/pdf">';
                } else {
                    echo 'N/A';
                }
                echo '</td>';
                echo '<td>' . $row['filename'] . '</td>';
                echo '<td><input type="checkbox" name="files[]" value="' . $row['id'] . '"></td>';
                echo '<td><input type="submit" name="delete" value="Delete"></td>';
                echo '</tr>';
            }
            ?>
        </table>
        <input type="submit" name="download" value="Download">
    </form>
</main>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if (isset($fileNotExist) && $fileNotExist): ?>
            alert('File does not exist.');
        <?php endif; ?>
    });
</script>
</body>
</html>
