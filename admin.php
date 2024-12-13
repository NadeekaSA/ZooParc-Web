<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="animalstyle.css">
    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this record?')) {
                alert('Record deleted successfully!');
                return true; // Proceed with form submission
            } else {
                alert('Delete action canceled.');
                return false; // Prevent form submission
            }
        }
    </script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="zooparc.png" alt="ZooParc Logo">
            <h1>ZooParc</h1>
        </div>
        <nav>
            <ul>
                
            </ul>
        </nav>
</div>
        <div>
           <a class="enquire-button" href="memberwelcome.php">Go-to Community</a>
           <a class="enquire-button" href="logout.php">Logout</a>
        </div>
</header>
<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("location: member.php");
}
$uid=$_SESSION['email'];
 echo "HELLO!!  ".$uid."  YOU ARE WELCOME!";
 echo '<br>';
include 'loginconnection.php';

// Handle add, update, and delete actions for registration table
if (isset($_POST['action1'])) {
    $action1 = $_POST['action1'];
    if ($action1 == 'add') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Hash the password
        $role = $_POST['role'];
        $conn->query("INSERT INTO registration (name, phone, address, dob, email, password, role) VALUES ('$name', '$phone', '$address', '$dob', '$email', '$password', '$role')");
    } elseif ($action1 == 'update') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Hash the password
        $role = $_POST['role'];
        $conn->query("UPDATE registration SET name='$name', phone='$phone', address='$address', dob='$dob', email='$email', password='$password', role='$role' WHERE id=$id");
    } 
}

// Handle add, update, and delete actions for events table
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action2'])) {
        $action = $_POST['action2'];
        $id = $_POST['id'] ?? null;

        if ($action == 'update' && $id !== null) {
            // Handle update action
            $event_name = $_POST['event_name'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $location = $_POST['location'];
            $start_time = $_POST['start_time'];
            $status = $_POST['status'];
            $imageurl = $_POST['imageurl'];

            $updateQuery = "UPDATE events SET event_name = ?, description = ?, date = ?, location = ?, start_time = ?, status = ?, imageurl = ? WHERE event_id = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("sssssssi", $event_name, $description, $date, $location, $start_time, $status, $imageurl, $id);
            $stmt->execute();
            $stmt->close();
        } elseif ($action == 'add') {
            // Handle add action
            $event_name = $_POST['event_name'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $location = $_POST['location'];
            $start_time = $_POST['start_time'];
            $status = $_POST['status'];
            $imageurl = $_POST['imageurl'];

            $addQuery = "INSERT INTO events (event_name, description, date, location, start_time, status, imageurl) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($addQuery);
            $stmt->bind_param("sssssss", $event_name, $description, $date, $location, $start_time, $status, $imageurl);
            $stmt->execute();
            $stmt->close();
        }
    }
}
?>
<br><br>
<h3 class="top-heading">Admin Dashboard</h3>
<br><br>
<h1 class="top-heading">Member Details Table <hr></h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php
    // Fetch records from the database
    $result1 = $conn->query("SELECT * FROM registration");

    while ($row = $result1->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['dob'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td>
            <form method='post' action='delete.php' onsubmit='return confirmDelete();'>
                <input type='hidden' name='id' value='" . $row['id'] . "'>
                <input type='hidden' name='table' value='registration'>
                <input type='submit' value='Delete'>
            </form>
            <form method='post'>
                <input type='hidden' name='id' value='" . $row['id'] . "'>
                <input type='hidden' name='action1' value='update'>
                <input type='text' name='name' value='" . $row['name'] . "'>
                <input type='text' name='phone' value='" . $row['phone'] . "'>
                <input type='text' name='address' value='" . $row['address'] . "'>
                <input type='date' name='dob' value='" . $row['dob'] . "'>
                <input type='email' name='email' value='" . $row['email'] . "'>
                <input type='password' name='password' value='" . $row['password'] . "'>
                <input type='text' name='role' value='" . $row['role'] . "'>
                <input type='submit' value='Update'>
            </form>
        </td>";
        echo "</tr>";
    }
    ?>
    </table>
    <br>
    <h2 class="top-heading">Add Memeber Details to Table </h2>
    <form method="post">
        <input type="hidden" name="action1" value="add">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="phone" placeholder="Phone">
        <input type="text" name="address" placeholder="Address">
        <input type="date" name="dob" placeholder="Date of Birth">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="text" name="role" placeholder="Role">
        <input type="submit" name="add01" value="Add" class="enquire-button">
        <input type="reset"  value="Reset" class="enquire-button">
    </form>
    <br>
    <div>
        <hr>
    </div>
     <br><br>
    <h1 class="top-heading">Event Details Table <hr></h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Event Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Location</th>
            <th>Start Time</th>
            <th>Status</th>
            <th>Image URL</th>
            <th>Actions</th>
        </tr>
        <?php
        $result2 = $conn->query("SELECT * FROM events");
        while ($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['event_id'] . "</td>";
            echo "<td>" . $row['event_name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['start_time'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['imageurl'] . "</td>";
            echo "<td>
                <form method='post' action='delete.php' onsubmit='return confirmDelete();'>
                    <input type='hidden' name='id' value='" . $row['event_id'] . "'>
                    <input type='hidden' name='table' value='events'>
                    <input type='submit' value='Delete'>
                </form>
                <form method='post'>
                    <input type='hidden' name='id' value='" . $row['event_id'] . "'>
                    <input type='hidden' name='action2' value='update'>
                    <input type='text' name='event_name' value='" . $row['event_name'] . "'>
                    <input type='text' name='description' value='" . $row['description'] . "'>
                    <input type='date' name='date' value='" . $row['date'] . "'>
                    <input type='text' name='location' value='" . $row['location'] . "'>
                    <input type='time' name='start_time' value='" . $row['start_time'] . "'>
                    <input type='text' name='status' value='" . $row['status'] . "'>
                    <input type='text' name='imageurl' value='" . $row['imageurl'] . "'>
                    <input type='submit' value='Update'>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <h2 class="top-heading">Add Event Details to Table</h2>
    <form method="post">
        <input type="hidden" name="action2" value="add">
        <input type="text" name="event_name" placeholder="Event Name">
        <input type="text" name="description" placeholder="Description">
        <input type="date" name="date" placeholder="Date">
        <input type="text" name="location" placeholder="Location">
        <input type="time" name="start_time" placeholder="Start Time">
        <input type="text" name="status" placeholder="Status">
        <input type="text" name="imageurl" placeholder="Image URL">
        <input type="submit" name="add" value="Add" class="enquire-button">
        <input type="reset" value="Reset" class="enquire-button">
    </form>
    </div>
<br>
<div>
<h1 class="top-heading">Event Enrollment Details <hr></h1>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Event ID</th>
        </tr>
        <?php
        $result2 = $conn->query("SELECT * FROM enrollments");
        while ($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['event_id'] . "</td>";
            echo "</tr>";
        }
        ?>
<br><br><br><br>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Subject</th>
            <th>Description & References</th>
        </tr>
        <?php
        $result2 = $conn->query("SELECT * FROM uploads");
        while ($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "</tr>";
        }
        ?>
        <h1 class="top-heading">Educational Uploads by Community Members <hr></h1>
</div>


<?php
$conn->close();
?>
</body>
</html>